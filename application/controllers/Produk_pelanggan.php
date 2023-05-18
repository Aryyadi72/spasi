<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_pelanggan extends CI_Controller {

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
	public function index()
	{
		$title['title'] = "Produk - SPASI";
		$data['produk'] = $this->M_produk->show_data()->result();
		$this->load->view('page_pelanggan/templates/header', $title);
        $this->load->view('page_pelanggan/templates/navbar');
        $this->load->view('page_pelanggan/produk/v_produk_pelanggan', $data);
        $this->load->view('page_pelanggan/templates/footer');
	}

    public function detail_produk_pelanggan()
	{
		$data['title'] = "Detail Produk - SPASI";
		$this->load->view('page_pelanggan/templates/header', $data);
        $this->load->view('page_pelanggan/templates/navbar');
        $this->load->view('page_pelanggan/produk/v_detail_produk_pelanggan');
        $this->load->view('page_pelanggan/templates/footer');
	}
}
