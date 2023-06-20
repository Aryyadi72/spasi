<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_pelanggan extends CI_Controller {

	public function transaksi()
	{
		$this->load->library('session');
		$title['title'] = "Transaksi - SPASI";
		$data['data'] = $this->input->get('id');
		$data['id_pelanggan'] = $this->session->userdata('id_pelanggan');

		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$dataCount['username'] = $this->db->get_where('tb_pelanggan', ['id_pelanggan' => $id_pelanggan])->row_array();
        $dataCount['total'] = $this->M_keranjang->getTotalKeranjang($id_pelanggan);

		$this->load->view('page_pelanggan/templates/header', $title);
        $this->load->view('page_pelanggan/templates/navbar', $dataCount);
        $this->load->view('page_pelanggan/transaksi/v_transaksi_pelanggan', $data);
        $this->load->view('page_pelanggan/templates/footer');
	}

	public function proses_tambah()
	{
		$tanggal_transakasi_masuk 	= $this->input->post('tanggal_transakasi_masuk');
		$jumlah 					= $this->input->post('jumlah');
		$total_harga 				= $this->input->post('total_harga');
		$keterangan 				= $this->input->post('keterangan');
		$id_pelanggan 				= $this->input->post('id_pelanggan');
		$id_produk 					= $this->input->post('id_produk');
		$metode_pembayaran 			= $this->input->post('metode_pembayaran');
		$metode_pengiriman 			= $this->input->post('metode_pengiriman');
		$status 					= $this->input->post('status');

		$harga_satuan = $this->db->get_where('tb_produk', array('id_produk' => $id_produk))->row()->harga_produk;
		
		$total_harga = $jumlah * $harga_satuan;

		$data = array(
			'tanggal_transakasi_masuk' 	=> date('Y-m-d H:i:s'),
			'jumlah' 					=> $jumlah,
            'total_harga' 				=> $total_harga,
			'keterangan' 				=> $keterangan,
			'id_pelanggan' 				=> $id_pelanggan,
			'id_produk' 				=> $id_produk,
			'metode_pembayaran' 		=> $metode_pembayaran,
			'metode_pengiriman' 		=> $metode_pengiriman,
			'status' 					=> $status,
        );
        
		$result = $this->M_transaksi->tambahTransaksi($data);
        
        if ($result) {
            // Pesanan berhasil ditambahkan
            redirect('dashboard_pelanggan');
        } else {
            // Gagal menambahkan pesanan
            echo 'Gagal menambahkan pesanan.';
        }

	}
}
