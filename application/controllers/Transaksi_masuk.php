<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_masuk extends CI_Controller {

	public function index()
	{
		$title['title'] = "Transaski Masuk - SPASI";
		$data['transaksi'] = $this->M_transaksi->show_data('tb_transaksi_masuk')->result();
		$this->load->view('templates/header', $title);
		$this->load->view('transaksi_masuk/v_transaksi_masuk', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_proses()
	{
		$this->load->library('session');
		$title['title'] = "Transaksi - SPASI";
		$data['data'] = $this->input->get('id');
		$data['id_pengelola'] = $this->session->userdata('id_pengelola');

		$this->load->view('templates/header', $title);
		$this->load->view('transaksi_masuk/v_transaksi_lanjut', $data);
		$this->load->view('templates/footer');
	}

	public function ubah_transaksi_masuk($id)
	{
		$title['title'] = "Transaksi - SPASI";
		$data['transaksi'] = $this->M_transaksi->update_transaksi($id);
		// $data['tambahan'] = $this->M_transaksi->masuk_detail_a()->result();

		$this->load->view('templates/header', $title);
		$this->load->view('transaksi_masuk/v_transaksi_lanjut', $data);
		$this->load->view('templates/footer');
	}

	public function proses_ubah()
	{
		$tanggal_transaksi_proses 	= $this->input->post('tanggal_transaksi_proses');
		$id_pengelola 				= $this->input->post('id_pengelola');
		$id_transaksi_masuk 		= $this->input->post('id_transaksi_masuk');

		$data = array(
			'tanggal_transaksi_proses' 	=> date('Y-m-d H:i:s'),
			'id_pengelola' 				=> $id_pengelola,
			'id_transaksi_masuk' 		=> $id_transaksi_masuk,
        );
        
		$this->db->insert('tb_transaksi_proses', $data);
		// $result = $this->M_transaksi->tambahTransaksiMasukKeDiproses($data);
        redirect('transaksi_masuk/transaksi_proses');
	}

	public function proses_transaksi($id)
	{
		$keterangan 		= $this->input->post('keterangan');
		$status 			= $this->input->post('status');

		$this->db->trans_start(); // Memulai transaksi

		// Perubahan data pada tabel transaksi_masuk
		$data_transaksi_masuk = array(
			'keterangan' => $keterangan,
			'status' => $status
		);
		$this->db->where('id_transaksi_masuk', $id);
		$this->db->update('tb_transaksi_masuk', $data_transaksi_masuk);

		$id_pengelola = $this->session->userdata('id_pengelola');

		// Penambahan data baru pada tabel transaksi_proses
		$data_transaksi_proses = array(
			'id_transaksi_masuk' 		=> $id,
			'tanggal_transaksi_proses' 	=> date('Y-m-d H:i:s'),
			'id_pengelola' 				=> $id_pengelola,
			// tambahkan data lain yang ingin ditambahkan ke tabel transaksi_proses
		);
		$this->db->insert('tb_transaksi_proses', $data_transaksi_proses);

		// Retrieve product ID from tb_transaksi_masuk
		$this->db->select('id_produk, jumlah');
		$this->db->where('id_transaksi_masuk', $id);
		$query = $this->db->get('tb_transaksi_masuk');
		$row = $query->row();

		$id_produk = $row->id_produk;
		$jumlah = $row->jumlah;

		// Update stock in tb_produk
		$this->db->set('stok', 'stok - ' . $jumlah, FALSE);
		$this->db->where('id_produk', $id_produk);
		$this->db->update('tb_produk');

		$this->db->trans_complete(); // Menyelesaikan transaksi

		if ($this->db->trans_status() === FALSE) {
			// Jika terjadi kesalahan dalam transaksi
			echo 'Terjadi kesalahan dalam transaksi.';
		} else {
			// Jika transaksi berhasil
			echo 'Transaksi berhasil dilakukan.';
		}

		redirect('transaksi_masuk/transaksi_proses'); // Redirect ke halaman transaksi
	}

	public function transaksi_selesai($id_transaksi_masuk)
    {
        $this->db->select('*');
		$this->db->where('id_transaksi_masuk', $id_transaksi_masuk); // Mengubah filter menjadi id_transaksi_proses
        $query = $this->db->get('tb_transaksi_proses');
        $result = $query->result();

        $tanggal_transaksi_keluar = date('Y-m-d');

        if (!empty($result)) {
            foreach ($result as $row) {
                $data = array(
					'tanggal_transaksi_keluar' 	=> $tanggal_transaksi_keluar,
                    'tanggal_transaksi_proses'	=> $row->tanggal_transaksi_proses,
                    'id_pengelola' 				=> $row->id_pengelola,
                    'id_transaksi_masuk'        => $row->id_transaksi_masuk,
                );
                $this->db->insert('tb_transaksi_keluar', $data);
            }
        }

		$this->db->where('id_transaksi_masuk', $id_transaksi_masuk); // Mengubah filter menjadi id_transaksi_proses
        $this->db->delete('tb_transaksi_proses'); // Menghapus data berdasarkan id_transaksi_proses

		// Update status in tb_transaksi_masuk
		$status_selesai = 'Selesai';
		$this->db->set('status', $status_selesai);
		$this->db->where('id_transaksi_masuk', $id_transaksi_masuk);
		$this->db->update('tb_transaksi_masuk');
        
        redirect('transaksi_masuk/transaksi_keluar');
    }


	public function transaksi_proses()
	{
		$title['title'] 		= "Transaski Proses - SPASI";
		$data['transaksi'] 		= $this->M_transaksi->show_data_proses('tb_transaksi_proses')->result();

		$this->load->view('templates/header', $title);
		$this->load->view('transaksi_proses/v_transaksi_proses', $data);
		$this->load->view('templates/footer');
	}

	public function detail_proses()
	{
		$title['title'] 	= "Detail Transaski Proses - SPASI";
		$data['data']		= $this->input->get('id');
		// $data['transaksi'] 		= $this->M_transaksi->show_data_proses('tb_transaksi_proses')->result();

		$this->load->view('templates/header', $title);
		$this->load->view('transaksi_proses/v_detail_transaksi_proses', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_keluar()
	{
		$tanggal_transaksi_keluar 	= $this->input->post('tanggal_transaksi_keluar');
		$id_transaksi_proses 		= $this->input->post('id_transaksi_proses');

		$data = array(
			'tanggal_transaksi_keluar' 	=> date('Y-m-d H:i:s'),
			'id_transaksi_proses' 		=> $id_transaksi_proses,
        );
        
		$this->db->insert('tb_transaksi_keluar', $data);
        redirect('transaksi_masuk/transaksi_keluar');

	}

	public function transaksi_keluar()
	{
		$title['title'] = "Transaksi Keluar - SPASI";
		// $data['tselesai'] = $this->M_transaksi->show_data_selesai()->result();
		$data['tselesai'] = $this->db->get('tb_transaksi_keluar')->result();

		$this->load->view('templates/header', $title);
		$this->load->view('transaksi_keluar/v_transaksi_keluar', $data);
		$this->load->view('templates/footer');
	}
	
	public function proses_batal()
	{
		$tanggal_transaksi_batal 	= $this->input->post('tanggal_transaksi_batal');
		$id_pengelola 				= $this->input->post('id_pengelola');
		$id_transaksi_masuk 		= $this->input->post('id_transaksi_masuk');
		
		$data = array(
			'tanggal_transaksi_batal' 	=> date('Y-m-d H:i:s'),
			'id_pengelola' 				=> $id_pengelola,
			'id_transaksi_masuk' 		=> $id_transaksi_masuk,
        );
        
		$this->db->insert('tb_transaksi_batal', $data);
        redirect('transaksi_masuk/transaksi_keluar');
		
	}
	
	public function transaksi_batal()
	{
		$title['title'] = "Transaksi Batal - SPASI";
		$this->load->view('templates/header', $title);
		$this->load->view('transaksi_batal/v_transaksi_batal');
		$this->load->view('templates/footer');
	}

	public function strukbyid($id_transaksi_masuk) {
        $this->db->where('id_transaksi_masuk', $id_transaksi_masuk);
        $query = $this->db->get('tb_struk');

        if ($query->num_rows() > 0) {
            $data['struk'] = $query->row();
			$title['title'] = "Struk - SPASI";
			$this->load->view('templates/header', $title);
            $this->load->view('transaksi_masuk/v_struk', $data);
			$this->load->view('templates/footer');
        } else {
            echo 'Struk tidak ditemukan.';
        }
    }

	public function lokasibyid($id_transaksi_masuk) {
        $this->db->where('id_transaksi_masuk', $id_transaksi_masuk);
        $query = $this->db->get('tb_titik_pengiriman');

        if ($query->num_rows() > 0) {
            $data['lokasi'] = $query->row();
			$title['title'] = "Lokasi Pengiriman - SPASI";
			$this->load->view('templates/header', $title);
            $this->load->view('transaksi_masuk/v_lokasi', $data);
			$this->load->view('templates/footer');
        } else {
            echo 'Lokasi tidak ditemukan.';
        }
    }
}
