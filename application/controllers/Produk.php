<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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
		$this->load->view('templates/header', $title);
		$this->load->view('produk/v_detail', $data);
		$this->load->view('templates/footer');
	}

    public function produk()
	{
		$data['title'] = "Produk - SPASI";
		$this->load->view('templates/header', $data);
		$this->load->view('produk/v_produk');
		$this->load->view('templates/footer');
	}

	public function vproduk()
	{
		$data['produk'] = $this->M_produk->show_data()->result();
		// $data['produk'] = $this->M_produk->get_data('tb_produk')->result();
		$title['title'] = "Produk - SPASI";
		$this->load->view('templates/header', $title);
		$this->load->view('produk/v_produk_2', $data);
		$this->load->view('templates/footer');
	}

	public function detail_produk()
	{
		$data['title'] = "Detail Produk - SPASI";
		$this->load->view('templates/header', $data);
		$this->load->view('produk/v_detail_produk');
		$this->load->view('templates/footer');
	}
}
