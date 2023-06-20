<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelola extends CI_Controller {

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
		$data['pengelola'] = $this->M_pengelola->show_data()->result();
		$data['pengelola'] = $this->M_pengelola->get_data('tb_pengelola')->result();
		$data['title'] = "Pengelola - SPASI";
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');
		$this->load->view('templates/header', $data);
		$this->load->view('pengelola/v_pengelola', $data);
		$this->load->view('templates/footer');
	}

	public function addPengelola()
	{
		$data['title'] = "Tambah Pengelola - SPASI";
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');
		$this->load->view('templates/header', $data);
		$this->load->view('pengelola/v_tambah_pengelola');
		$this->load->view('templates/footer');
	}

	public function proses_tambah_pengelola()
	{
		$config['upload_path']          = './assets/upload/pengelola';
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
		$email 		= $this->input->post('email');
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$id_level 	= $this->input->post('id_level');

		$data = array(
			'nama' 		=> ucwords($nama),
            'alamat' 	=> $alamat,
			'no_telp' 	=> $no_telp,
			'foto' 		=> $foto,
			'email' 	=> $email,
			'username' 	=> $username,
			'password' 	=> md5($password),
			'id_level' 	=> $id_level,
        );
        
		$this->db->insert('tb_pengelola', $data);
        redirect('pengelola');

		}
	}

	public function updatePengelola($id)
	{
		$data['title'] = "Ubah Pengelola - SPASI";
		$data['pengelola'] = $this->M_pengelola->update_data($id);
		$id_pengelola = $this->session->userdata('id_pengelola');
		$data['username'] = $this->db->get_where('tb_pengelola', ['id_pengelola' => $id_pengelola])->row_array();
		$data['id_level'] 	= $this->session->userdata('id_level');
		
		$this->load->view('templates/header', $data);
		$this->load->view('pengelola/v_ubah_pengelola', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit($id)
    {
        $id = $this->input->post('id_pengelola');

		$config['upload_path']          = './assets/upload/pengelola';
        $config['allowed_types']        = 'gif|jpg|png|PNG|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {

		$nama 		= $this->input->post('nama');
		$alamat 	= $this->input->post('alamat');
		$no_telp 	= $this->input->post('no_telp');
		$email 		= $this->input->post('email');
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$id_level 	= $this->input->post('id_level');

		$data = array(
			'nama' 		=> ucwords($nama),
            'alamat' 	=> $alamat,
			'no_telp' 	=> $no_telp,
			'email' 	=> $email,
			'username' 	=> $username,
			'password' 	=> md5($password),
			'id_level' 	=> $id_level,
        );
        
		$this->db->where('id_pengelola', $id);
		$this->db->update('tb_pengelola', $data);
        redirect('pengelola');

        } else {
			
		$foto 		= $this->upload->data();
        $foto 		= $foto['file_name'];
		$nama 		= $this->input->post('nama');
		$alamat 	= $this->input->post('alamat');
		$no_telp 	= $this->input->post('no_telp');
		$email 		= $this->input->post('email');
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$id_level 	= $this->input->post('id_level');

		$data = array(
			'nama' 		=> ucwords($nama),
            'alamat' 	=> $alamat,
			'no_telp' 	=> $no_telp,
			'foto' 		=> $foto,
			'email' 	=> $email,
			'username' 	=> $username,
			'password' 	=> md5($password),
			'id_level' 	=> $id_level,
        );
        
		$this->db->where('id_pengelola', $id);
		$this->db->update('tb_pengelola', $data);
        redirect('pengelola');

		}

    }

	public function deletePengelola($id_pengelola)
	{
		$this->M_pengelola->delete_data($id_pengelola);
		// $this->session->set_flashdata('sukses', 'Data Dengan ID ' . $id_user . ' berhasil dihapus.');
		redirect(base_url('pengelola'));
	}
}
