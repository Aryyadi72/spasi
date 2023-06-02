<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_pelanggan extends CI_Controller {

	public function index()
	{
		$title['title'] = "Dashboard - SPASI";
		$data['transaksi'] = $this->db->get('tb_transaksi_masuk')->result();
		$this->load->view('page_pelanggan/templates/header', $title);
        $this->load->view('page_pelanggan/templates/navbar');
        $this->load->view('page_pelanggan/dashboard/v_dashboard_pelanggan', $data);
        $this->load->view('page_pelanggan/templates/footer');
	}

	public function file_struk()
	{
		$title['title'] = "Kirim Struk - SPASI";
		$id_transaksi_masuk['a'] = $this->input->get('id');
		$this->load->view('page_pelanggan/templates/header', $title);
        $this->load->view('page_pelanggan/templates/navbar');
        $this->load->view('page_pelanggan/file_pembayaran/v_tambah_file_pembayaran', $id_transaksi_masuk);
        $this->load->view('page_pelanggan/templates/footer');
	}

	public function proses_tambah()
	{
		$config['upload_path']          = './assets/upload/struk/';
        $config['allowed_types']        = 'gif|jpg|png|PNG';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal Tambah";
        } else {
			
		$file_struk 		= $this->upload->data();
        $file_struk 		= $file_struk['file_name'];
		$id_transaksi_masuk = $this->input->post('id_transaksi_masuk');

		$data = array(
			'id_transaksi_masuk' 	=> $id_transaksi_masuk,
			'file_struk' 			=> $file_struk,
        );
        
		$this->db->insert('tb_struk', $data);
        redirect('dashboard_pelanggan');

		}
	}

	public function lokasi_pengiriman()
	{
		$title['title'] = "Lokasi Pengiriman - SPASI";
		$id_transaksi_masuk['a'] = $this->input->get('id');
		$this->load->view('page_pelanggan/templates/header', $title);
        $this->load->view('page_pelanggan/templates/navbar');
        $this->load->view('page_pelanggan/lokasi_pengiriman/v_tambah_lokasi_pengiriman', $id_transaksi_masuk);
        $this->load->view('page_pelanggan/templates/footer');
	}

	public function tambah_lokasi()
	{
		$id_transaksi_masuk = $this->input->post('id_transaksi_masuk');
		$alamat_tujuan 		= $this->input->post('alamat_tujuan');
		$latlong 			= $this->input->post('latlong');

		$data = array(
			'id_transaksi_masuk' 	=> $id_transaksi_masuk,
			'alamat_tujuan' 		=> $alamat_tujuan,
			'latlong' 				=> $latlong,
        );
        
		$this->db->insert('tb_titik_pengiriman', $data);
        redirect('dashboard_pelanggan');
	}

}
