<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_pelanggan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

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

    // public function _rules()
	// {
	// 	$this->form_validation->set_rules('id_pelanggan','nama_pelanggan','alamat','no_telp','foto','username','password','id_level','userfile','File','required');
	
	// }

    public function _rules()
    {
        $this->form_validation->set_rules(
            'no_telp',
            'Nomor Telepon',
            'required|is_unique[tb_pelanggan.no_telp]'
        );
    }

	public function proses_tambah_pelanggan()
	{
        $this->_rules();

		$config['upload_path']          = './assets/upload/pelanggan';
        $config['allowed_types']        = 'gif|jpg|png|PNG';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->form_validation->run() || !$this->upload->do_upload('userfile')) {
            echo "Gagal Tambah";
        } else {
			
		$foto 		    = $this->upload->data();
        $foto 		    = $foto['file_name'];
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$alamat 	    = $this->input->post('alamat');
		$no_telp 	    = $this->input->post('no_telp');
		$username 	    = $this->input->post('username');
		$password 	    = $this->input->post('password');
		$id_level 	    = $this->input->post('id_level');

		$data = array(
			'nama_pelanggan' 	=> ucwords($nama_pelanggan),
            'alamat' 	        => $alamat,
			'no_telp' 	        => $no_telp,
			'foto' 		        => $foto,
			'username' 	        => $username,
			'password' 	        => md5($password),
			'id_level' 	        => $id_level,
        );
        
		$this->db->insert('tb_pelanggan', $data);
        redirect('login_pelanggan');

		}
	}

	public function auth()
    {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
    
    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Username dan Password wajib diisi !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
        redirect('login_pelanggan');
    } else {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    
    $cek = $this->M_login_pelanggan->cek_login($username, $password);
    
    if (!$cek) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Username atau Password salah !</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('login_pelanggan');
    } else {
        $this->session->set_userdata('id_level', $cek->id_level);
        $this->session->set_userdata('username', $cek->username);
		$this->session->set_userdata('id_pelanggan', $cek->id_pelanggan);
    
            switch ($cek->id_level) {
                case 1:
                    redirect('dashboard');
                    break;
                case 2:
                    redirect('adming/dashboardadmin');
                    break;
                case 3:
                    redirect('dashboard_pelanggan');
                    break;
                case 4:
                    redirect('pembelian/dashboard');
                    break;
                default:
                    // If id_level is not valid, clear session and redirect to login page
                    $this->session->unset_userdata('id_level');
                    $this->session->unset_userdata('username');
					$this->session->unset_userdata('id_pelanggan');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Anda tidak memiliki akses ke halaman ini !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('login_pelanggan');
                    break;
            }
        }
    }
    }

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('landing');
	}
}
