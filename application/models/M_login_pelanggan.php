<?php

class M_login_pelanggan extends CI_Model {

    public function cek_login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tb_pelanggan');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    public function cek_login_pengelola($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tb_pengelola');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
}