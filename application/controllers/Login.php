<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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

	public function login_kasir()
	{
		$data['title'] = "Login Kasir - SPASI";
		$this->load->view('login/v_login_kasir', $data);
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
        redirect('login/login_kasir');
    } else {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    
    $cek = $this->M_login_pelanggan->cek_login_pengelola($username, $password);
    
    if (!$cek) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Username atau Password salah !</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('login/login_kasir');
    } else {
        $this->session->set_userdata('id_level', $cek->id_level);
        $this->session->set_userdata('username', $cek->username);
		$this->session->set_userdata('id_pengelola', $cek->id_pengelola);
    
            switch ($cek->id_level) {
                case 1:
                    redirect('dashboard');
                    break;
                case 2:
                    redirect('dashboard');
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
					$this->session->unset_userdata('id_pengelola');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Anda tidak memiliki akses ke halaman ini !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('login/login_kasir');
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
