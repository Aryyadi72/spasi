<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

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
		$data['pelanggan'] = $this->M_pelanggan->show_data()->result();
		$data['pelanggan'] = $this->M_pelanggan->get_data('tb_pelanggan')->result();
		$data['title'] = "Pelanggan - SPASI";
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');
		$this->load->view('templates/header', $data);
		$this->load->view('pelanggan/v_pelanggan', $data);
		$this->load->view('templates/footer');
	}

	public function addPelanggan()
	{
		$data['title'] = "Tambah Pelanggan - SPASI";
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');
		$this->load->view('templates/header', $data);
		$this->load->view('pelanggan/v_tambah_pelanggan');
		$this->load->view('templates/footer');
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
			
		$foto 			= $this->upload->data();
        $foto 			= $foto['file_name'];
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$alamat 		= $this->input->post('alamat');
		$no_telp 		= $this->input->post('no_telp');
		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$id_level 		= $this->input->post('id_level');

		$data = array(
			'nama_pelanggan' 		=> ucwords($nama_pelanggan),
            'alamat' 	=> $alamat,
			'no_telp' 	=> $no_telp,
			'foto' 		=> $foto,
			'username' 	=> $username,
			'password' 	=> md5($password),
			'id_level' 	=> $id_level,
        );
        
		$this->db->insert('tb_pelanggan', $data);
        redirect('pelanggan');

		}
	}

	public function updatePelanggan($id)
	{
		$data['title'] = "Ubah Pelanggan - SPASI";
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');

		$this->load->view('templates/header', $data);
		$this->load->view('pelanggan/v_ubah_pelanggan', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit($id)
    {
        $id = $this->input->post('id_pelanggan');

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
		$password 	= $this->input->post('password');
		$id_level 	= $this->input->post('id_level');

		$data = array(
			'nama_pelanggan' 		=> ucwords($nama_pelanggan),
            'alamat' 	=> $alamat,
			'no_telp' 	=> $no_telp,
			'username' 	=> $username,
			'password' 	=> md5($password),
			'id_level' 	=> $id_level,
        );
        
		$this->db->where('id_pelanggan', $id);
		$this->db->update('tb_pelanggan', $data);
        redirect('pelanggan');

        } else {
			
		$foto 		= $this->upload->data();
        $foto 		= $foto['file_name'];
		$nama_pelanggan 		= $this->input->post('nama_pelanggan');
		$alamat 	= $this->input->post('alamat');
		$no_telp 	= $this->input->post('no_telp');
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$id_level 	= $this->input->post('id_level');

		$data = array(
			'nama_pelanggan' 		=> ucwords($nama_pelanggan),
            'alamat' 	=> $alamat,
			'no_telp' 	=> $no_telp,
			'foto' 		=> $foto,
			'username' 	=> $username,
			'password' 	=> md5($password),
			'id_level' 	=> $id_level,
        );
        
		$this->db->where('id_pelanggan', $id);
		$this->db->update('tb_pelanggan', $data);
        redirect('pelanggan');

		}

    }

	public function deletePelanggan($id_pelanggan)
	{
		$this->M_pelanggan->delete_data($id_pelanggan);
		// $this->session->set_flashdata('sukses', 'Data Dengan ID ' . $id_user . ' berhasil dihapus.');
		redirect(base_url('pelanggan'));
	}
}
