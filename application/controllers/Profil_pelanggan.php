<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_pelanggan extends CI_Controller {

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
		$title['title'] = "Profile - SPASI";
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$dataCount['username'] = $this->db->get_where('tb_pelanggan', ['id_pelanggan' => $id_pelanggan])->row_array();
        $dataCount['total'] = $this->M_keranjang->getTotalKeranjang($id_pelanggan);
		$data['profil'] = $this->M_pelanggan->update_data_2($id_pelanggan);

		$this->load->view('page_pelanggan/templates/header', $title);
        $this->load->view('page_pelanggan/templates/navbar', $dataCount);
        $this->load->view('page_pelanggan/profil/v_profil_pelanggan', $data);
        $this->load->view('page_pelanggan/templates/footer');
	}

}
