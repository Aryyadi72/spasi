<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_pelanggan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function transaksi()
	{
		$title['title'] = "Transaksi - SPASI";
		$data['data'] = $this->input->get('id');

		$this->load->view('page_pelanggan/templates/header', $title);
        $this->load->view('page_pelanggan/templates/navbar');
        $this->load->view('page_pelanggan/transaksi/v_transaksi_pelanggan', $data);
        $this->load->view('page_pelanggan/templates/footer');
	}

	public function proses_tambah()
	{
		$tanggal_transakasi_masuk = $this->input->post('tanggal_transakasi_masuk');
		$jumlah 			= $this->input->post('jumlah');
		$total_harga 		= $this->input->post('total_harga');
		$keterangan 		= $this->input->post('keterangan');
		$id_pelanggan 		= $this->input->post('id_pelanggan');
		$id_produk 			= $this->input->post('id_produk');

		$data = array(
			'tanggal_transakasi_masuk' =>date('Y-m-d H:i:s'),
			'jumlah' 		=> $jumlah,
            'total_harga' 	=> $total_harga,
			'keterangan' 	=> $keterangan,
			'id_pelanggan' 	=> $id_pelanggan,
			'id_produk' 	=> $id_produk,
        );
        
		$this->db->insert('tb_transaksi_masuk', $data);
        redirect('dashboard_pelanggan');

		}
	}
