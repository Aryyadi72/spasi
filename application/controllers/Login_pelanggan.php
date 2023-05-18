<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_pelanggan extends CI_Controller {

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
		$data['title'] = "Login Pelanggan - SPASI";
		$this->load->view('page_pelanggan/login/v_login_pelanggan', $data);
	}

	public function daftar_pelanggan()
	{
		$data['title'] = "Register - SPASI";
		$this->load->view('page_pelanggan/login/v_daftar_pelanggan', $data);
	}

	public function proses_tambah_pelanggan()
	{
		$config['upload_path']          = './assets/upload/pelanggan';
        $config['allowed_types']        = 'gif|jpg|png|PNG';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal Tambah";
        } else {
			
		$foto 		= $this->upload->data();
        $foto 		= $foto['file_name'];
		$nama 		= $this->input->post('nama');
		$alamat 	= $this->input->post('alamat');
		$no_telp 	= $this->input->post('no_telp');
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$id_level 	= $this->input->post('id_level');

		$data = array(
			'nama' 		=> ucwords($nama),
            'alamat' 	=> $alamat,
			'no_telp' 	=> $no_telp,
			'foto' 		=> $foto,
			'username' 	=> $username,
			'password' 	=> md5($password),
			'id_level' 	=> $id_level,
        );
        
		$this->db->insert('tb_pelanggan', $data);
        redirect('login_pelanggan');

		}
	}
}
