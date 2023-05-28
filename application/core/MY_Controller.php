<?php
class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Periksa apakah pengguna sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('login_pelanggan/auth');
        }
    }
}
