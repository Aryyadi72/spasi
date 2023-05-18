<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sasirangan extends CI_Controller {

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
		$data['sasirangan'] = $this->M_sasirangan->show_data()->result();
		$data['sasirangan'] = $this->M_sasirangan->get_data('tb_sasirangan')->result();
		$title['title'] = "Data Sasirngan - SPASI";
		$this->load->view('templates/header', $title);
		$this->load->view('sasirangan/v_sasirangan', $data);
		$this->load->view('templates/footer');
	}

    public function addSasirangan()
	{
		$data['title'] = "Tambah Sasirangan - SPASI";
		$this->load->view('templates/header', $data);
		$this->load->view('sasirangan/v_tambah_sasirangan');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$config['upload_path']          = './assets/upload/';
        $config['allowed_types']        = 'gif|jpg|png|PNG';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal Tambah";
        } else {
			
		$foto_sasirangan 		= $this->upload->data();
        $foto_sasirangan 		= $foto_sasirangan['file_name'];
		$nama_sasirangan 		= $this->input->post('nama_sasirangan');
		$jenis_sasirangan 		= $this->input->post('jenis_sasirangan');

		$data = array(
			'nama_sasirangan' 	=> ucwords($nama_sasirangan),
            'jenis_sasirangan' 	=> $jenis_sasirangan,
			'foto_sasirangan' 	=> $foto_sasirangan,
        );
        
		$this->db->insert('tb_sasirangan', $data);
        redirect('sasirangan');

		}
	}

	public function updateSasirangan($id)
	{
		$title['title'] 	= "Ubah Sasirangan - SPASI";
		$data['sasirangan'] = $this->M_sasirangan->update_data($id);

		$this->load->view('templates/header', $title);
		$this->load->view('sasirangan/v_ubah_sasirangan', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit($id)
    {
        $id = $this->input->post('id_sasirangan');

		$config['upload_path']          = './assets/upload/';
        $config['allowed_types']        = 'gif|jpg|png|PNG|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {

        $nama_sasirangan 		= $this->input->post('nama_sasirangan');
		$jenis_sasirangan 		= $this->input->post('jenis_sasirangan');

		$data = array(
			'nama_sasirangan' 	=> ucwords($nama_sasirangan),
            'jenis_sasirangan' 	=> $jenis_sasirangan,
        );
        
		$this->db->where('id_sasirangan', $id);
		$this->db->update('tb_sasirangan', $data);
        redirect('sasirangan');

        } else {
			
		$foto_sasirangan 		= $this->upload->data();
        $foto_sasirangan 		= $foto_sasirangan['file_name'];
		$nama_sasirangan 		= $this->input->post('nama_sasirangan');
		$jenis_sasirangan 		= $this->input->post('jenis_sasirangan');

		$data = array(
			'nama_sasirangan' 	=> ucwords($nama_sasirangan),
            'jenis_sasirangan' 	=> $jenis_sasirangan,
			'foto_sasirangan' 	=> $foto_sasirangan,
        );
        
		$this->db->where('id_sasirangan', $id);
		$this->db->update('tb_sasirangan', $data);
        redirect('sasirangan');

		}
    }

	public function deleteSasirangan($id_sasirangan)
    {
		$this->M_sasirangan->delete_data($id_sasirangan);
        // $this->session->set_flashdata('sukses', 'Data Dengan ID ' . $id_user . ' berhasil dihapus.');
        redirect(base_url('sasirangan'));
    }
}
