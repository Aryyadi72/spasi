<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_proses extends CI_Controller {

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
		$data['title'] = "Transaski Proses - SPASI";
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi_proses/v_transaksi_proses');
		$this->load->view('templates/footer');
	}
}
