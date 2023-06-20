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
		$data['title'] = "Produk - SPASI";
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');
		$this->load->view('templates/header', $data);
		$this->load->view('produk/v_detail', $data);
		$this->load->view('templates/footer');
	}

    public function produk()
	{
		$data['title'] = "Produk - SPASI";
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');
		$this->load->view('templates/header', $data);
		$this->load->view('produk/v_produk');
		$this->load->view('templates/footer');
	}

	public function vproduk()
	{
		$data['produk'] = $this->M_produk->show_data()->result();
		$data['title'] = "Produk - SPASI";
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');
		$this->load->view('templates/header', $data);
		$this->load->view('produk/v_produk_2', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_produk()
	{
		$data['title'] = "Tambah Produk - SPASI";
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');
		$data['produk'] = $this->M_produk->get_data();

		$this->load->view('templates/header', $data);
		$this->load->view('produk/v_tambah_produk', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$tanggal_ditambahkan = $this->input->post('tanggal_ditambahkan');
		$harga_produk 		= $this->input->post('harga_produk');
		$deskripsi_produk 	= $this->input->post('deskripsi_produk');
		$stok 				= $this->input->post('stok');
		$id_sasirangan		= $this->input->post('id_sasirangan');

		$data = array(
			'tanggal_ditambahkan'	=> date('Y-m-d H:i:s'),
			'harga_produk' 		=> $harga_produk,
			'deskripsi_produk'	=> $deskripsi_produk,
			'stok' 				=> $stok,
			'id_sasirangan'		=> $id_sasirangan
        );
        
		$this->db->insert('tb_produk', $data);
        redirect('produk/vproduk');
	}

	public function updateProduk($id)
	{
		$data['title'] 	= "Ubah Produk - SPASI";
		$data['produk'] = $this->M_produk->update_data($id);
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');

		$this->load->view('templates/header', $data);
		$this->load->view('produk/v_ubah_produk', $data);
		$this->load->view('templates/footer');
	}

	public function proses_ubah($id)
	{
		$tanggal_ditambahkan = $this->input->post('tanggal_ditambahkan');
		$harga_produk 		= $this->input->post('harga_produk');
		$deskripsi_produk 	= $this->input->post('deskripsi_produk');
		$stok 				= $this->input->post('stok');
		$id_sasirangan		= $this->input->post('id_sasirangan');

		$data = array(
			'tanggal_ditambahkan'	=> date('Y-m-d H:i:s'),
			'harga_produk' 		=> $harga_produk,
			'deskripsi_produk'	=> $deskripsi_produk,
			'stok' 				=> $stok,
			'id_sasirangan'		=> $id_sasirangan
        );
        
		$this->db->where('id_produk', $id);
		$this->db->update('tb_produk', $data);
        redirect('produk/vproduk');
	}

	public function deleteProduk($id_produk)
    {
		$this->M_produk->delete_data($id_produk);
        // $this->session->set_flashdata('sukses', 'Data Dengan ID ' . $id_user . ' berhasil dihapus.');
        redirect(base_url('produk/vproduk'));
    }

	public function detail_produk()
	{
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');
		$data['title'] = "Detail Produk - SPASI";
		$this->load->view('templates/header', $data);
		$this->load->view('produk/v_detail_produk');
		$this->load->view('templates/footer');
	}
}
