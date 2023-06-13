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
		$this->load->library('session');
		$data['data'] = $this->input->get('id');
		$data['id_pelanggan'] = $this->session->userdata('id_pelanggan');
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

	public function tambah_keranjang($id)
	{
		$this->load->library('cart');
		$this->load->library('session');
		$sasirangan = $this->M_produk->find($id);
		// $jumlah 	= $this->input->post('jumlah');

		$qty = 1; // Atur qty sesuai kebutuhan Anda

		$total_harga = $sasirangan->harga_produk * $qty; // Hitung total harga

		$data = array(
			'id'   	=> $sasirangan->id_produk,
			'qty'  	=> $qty,
			'price' => $sasirangan->harga_produk,
			'name' 	=> $sasirangan->id_sasirangan,
			'total' => $total_harga
		);

		$this->cart->insert($data);

		$cart_total = $this->cart->total_items();
		$this->session->set_userdata('cart_total', $cart_total);

		redirect('produk_pelanggan');
	}

	public function detail_keranjang()
	{
		$title['title'] = "Detail Keranjang - SPASI";
		$data['items'] = $this->cart->contents();
		$this->load->library('session');
		$data['data'] = $this->input->get('id');
		$data['id_pelanggan'] = $this->session->userdata('id_pelanggan');
		$this->load->view('page_pelanggan/templates/header', $title);
        $this->load->view('page_pelanggan/templates/navbar');
        $this->load->view('page_pelanggan/produk/v_detail_keranjang', $data);
        $this->load->view('page_pelanggan/templates/footer');
	}
}
