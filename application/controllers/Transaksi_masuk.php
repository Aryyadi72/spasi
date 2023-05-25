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
		$title['title'] = "Transaksi - SPASI";
		$data['data'] = $this->input->get('id');
		// $data['data'] = $this->input->get('idp');

		$this->load->view('templates/header', $title);
		$this->load->view('transaksi_masuk/v_transaksi_lanjut', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$tanggal_transaksi_proses 	= $this->input->post('tanggal_transaksi_proses');
		$id_pengelola 				= $this->input->post('id_pengelola');
		$id_transaksi_masuk 		= $this->input->post('id_transaksi_masuk');

		$data = array(
			'tanggal_transaksi_proses' 	=> date('Y-m-d H:i:s'),
			'id_pengelola' 				=> $id_pengelola,
			'id_transaksi_masuk' 		=> $id_transaksi_masuk,
        );
        
		// $this->db->insert('tb_transaksi_proses', $data);
		$result = $this->M_transaksi->tambahTransaksiMasukKeDiproses($data);
        redirect('transaksi_masuk/transaksi_proses');

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
		$this->load->view('templates/header', $title);
		$this->load->view('transaksi_keluar/v_transaksi_keluar');
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
}
