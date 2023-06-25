<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_masuk extends CI_Controller {

	public function index()
	{
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');
		$data['title'] = "Transaski Masuk - SPASI";
		$data['transaksi'] = $this->M_transaksi->show_data()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi_masuk/v_transaksi_masuk', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_proses()
	{
		$this->load->library('session');
		$data['title'] = "Transaksi - SPASI";
		$data['data'] = $this->input->get('id');
		$data['id_pengelola'] = $this->session->userdata('id_pengelola');
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');

		$this->load->view('templates/header', $data);
		$this->load->view('transaksi_masuk/v_transaksi_lanjut', $data);
		$this->load->view('templates/footer');
	}

	public function ubah_transaksi_masuk($id)
	{
		$data['title'] = "Transaksi - SPASI";
		$data['transaksi'] = $this->M_transaksi->update_transaksi($id);
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');
		// $data['tambahan'] = $this->M_transaksi->masuk_detail_a()->result();

		$this->load->view('templates/header', $data);
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
		$data['title'] 		= "Transaski Proses - SPASI";
		$data['transaksi'] 		= $this->M_transaksi->show_data_proses('tb_transaksi_proses')->result();
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');

		$this->load->view('templates/header', $data);
		$this->load->view('transaksi_proses/v_transaksi_proses', $data);
		$this->load->view('templates/footer');
	}

	public function detail_proses()
	{
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');
		$data['title'] 	= "Detail Transaski Proses - SPASI";
		$data['data']		= $this->input->get('id');
		// $data['transaksi'] 		= $this->M_transaksi->show_data_proses('tb_transaksi_proses')->result();

		$this->load->view('templates/header', $data);
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
		$data['title'] = "Transaksi Keluar - SPASI";
		// $data['tselesai'] = $this->M_transaksi->show_data_selesai()->result();
		$data['tselesai'] = $this->db->get('tb_transaksi_keluar')->result();
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');

		$this->load->view('templates/header', $data);
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
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');
		$data['title'] = "Transaksi Batal - SPASI";
		$this->load->view('templates/header', $data);
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

	public function detail_invoice($id)
	{
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();

		$data['id_level'] 	= $this->session->userdata('id_level');
		$data['title'] = "Transaski Masuk - SPASI";
		$data['transaksi'] = $this->M_transaksi->data_byinvoice($id);

		$this->load->view('templates/header', $data);
		$this->load->view('transaksi_masuk/v_detail_invoice', $data);
		$this->load->view('templates/footer');
	}

	public function proses_transaksi_banyak($id)
	{
		$selectedItems = $this->input->post('selected_items');
		$keterangan = $this->input->post('keterangan');
		$status = $this->input->post('status');

		$this->db->trans_start(); // Memulai transaksi

		foreach ($selectedItems as $itemId) {
			// Perubahan data pada tabel transaksi_masuk
			$data_transaksi_masuk = array(
				'keterangan' => $keterangan,
				'status' => $status,
			);
			$this->db->where('id_transaksi_masuk', $itemId);
			$this->db->update('tb_transaksi_masuk', $data_transaksi_masuk);

			$id_pengelola = $this->session->userdata('id_pengelola');

			// Penambahan data baru pada tabel transaksi_proses
			$data_transaksi_proses = array(
				'id_transaksi_masuk' => $itemId,
				'tanggal_transaksi_proses' => date('Y-m-d H:i:s'),
				'id_pengelola' => $id_pengelola,
				// tambahkan data lain yang ingin ditambahkan ke tabel transaksi_proses
			);
			$this->db->insert('tb_transaksi_proses', $data_transaksi_proses);

			// Retrieve product ID from tb_transaksi_masuk
			$this->db->select('id_produk, jumlah');
			$this->db->where('id_transaksi_masuk', $itemId);
			$query = $this->db->get('tb_transaksi_masuk');
			$row = $query->row();

			$id_produk = $row->id_produk;
			$jumlah = $row->jumlah;

			// Update stock in tb_produk
			$this->db->set('stok', 'stok - ' . $jumlah, FALSE);
			$this->db->where('id_produk', $id_produk);
			$this->db->update('tb_produk');
		}

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

	public function proses_transaksi_keluar($id_invoice)
	{
		$this->db->select('tb_transaksi_proses.*, tb_transaksi_masuk.id_invoice');
		$this->db->from('tb_transaksi_proses');
		$this->db->join('tb_transaksi_masuk', 'tb_transaksi_proses.id_transaksi_masuk = tb_transaksi_masuk.id_transaksi_masuk');
		$this->db->where('tb_transaksi_masuk.id_invoice', $id_invoice);
		$query = $this->db->get();
		$data_transaksi_proses = $query->result_array();

		$this->db->trans_start();

		foreach ($data_transaksi_proses as $transaksi_proses) {
			// Insert data ke tb_transaksi_keluar
			$data_transaksi_keluar = array(
				'id_transaksi_masuk' 		=> $transaksi_proses['id_transaksi_masuk'],
				'tanggal_transaksi_keluar' 	=> date('Y-m-d H:i:s'),
				'tanggal_transaksi_proses'	=> $transaksi_proses['tanggal_transaksi_proses'],
                'id_pengelola' 				=> $transaksi_proses['id_pengelola'],
                'id_transaksi_masuk'        => $transaksi_proses['id_transaksi_masuk'],
				// Tambahkan data lainnya sesuai kebutuhan
			);
			$this->db->insert('tb_transaksi_keluar', $data_transaksi_keluar);

			// Update status di tb_transaksi_masuk menjadi 'Keluar'
			$data_update_transaksi_masuk = array(
				'status' => 'Selesai'
			);
			$this->db->where('id_transaksi_masuk', $transaksi_proses['id_transaksi_masuk']);
			$this->db->update('tb_transaksi_masuk', $data_update_transaksi_masuk);

			// Delete data dari tb_transaksi_proses
			$this->db->where('id_transaksi_masuk', $transaksi_proses['id_transaksi_masuk']);
			$this->db->delete('tb_transaksi_proses');
		}

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			// Jika terjadi kesalahan dalam transaksi
			echo 'Terjadi kesalahan dalam transaksi.';
		} else {
			// Jika transaksi berhasil
			echo 'Transaksi berhasil dilakukan.';
		}

		redirect('transaksi_masuk/transaksi_keluar');
	}

}
