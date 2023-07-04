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

	public function proses_edit($id)
    {
		$id = $this->session->userdata('id_pelanggan');
        // $id = $this->input->post('id_pelanggan');

		$config['upload_path']          = './assets/upload/pelanggan';
        $config['allowed_types']        = 'gif|jpg|png|PNG|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {

		$nama_pelanggan 		= $this->input->post('nama_pelanggan');
		$alamat 	= $this->input->post('alamat');
		$no_telp 	= $this->input->post('no_telp');
		$username 	= $this->input->post('username');

		$data = array(
			'nama_pelanggan' 		=> ucwords($nama_pelanggan),
            'alamat' 	=> $alamat,
			'no_telp' 	=> $no_telp,
			'username' 	=> $username,
        );
        
		$this->db->where('id_pelanggan', $id);
		$this->db->update('tb_pelanggan', $data);
        redirect('dashboard_pelanggan');

        } else {
			
		$foto 					= $this->upload->data();
        $foto 					= $foto['file_name'];
		$nama_pelanggan 		= $this->input->post('nama_pelanggan');
		$alamat 				= $this->input->post('alamat');
		$no_telp 				= $this->input->post('no_telp');
		$username 				= $this->input->post('username');

		$data = array(
			'nama_pelanggan' 		=> ucwords($nama_pelanggan),
            'alamat' 				=> $alamat,
			'no_telp' 				=> $no_telp,
			'foto' 					=> $foto,
			'username' 				=> $username,
        );
        
		$this->db->where('id_pelanggan', $id);
		$this->db->update('tb_pelanggan', $data);
		
	}
	redirect('dashboard_pelanggan');

    }

}
