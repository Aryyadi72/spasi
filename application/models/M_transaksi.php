<?php
    class M_transaksi extends CI_Model
    {
        public function show_data()
        {
            $this->db->select('*');
            $this->db->from('tb_transaksi_masuk', 'tb_produk');
            $this->db->join('tb_pelanggan','tb_pelanggan.id_pelanggan = tb_transaksi_masuk.id_pelanggan');
            $this->db->join('tb_produk','tb_produk.id_produk = tb_transaksi_masuk.id_produk');
            $this->db->join('tb_sasirangan','tb_sasirangan.id_sasirangan = tb_produk.id_sasirangan');      
            $query = $this->db->get();
            return $query;
        }

        public function show_data_proses()
        {
            $this->db->select('*');
            $this->db->from('tb_transaksi_proses');
            $this->db->join('tb_pengelola','tb_pengelola.id_pengelola = tb_transaksi_proses.id_pengelola');
            $this->db->join('tb_transaksi_masuk','tb_transaksi_masuk.id_transaksi_masuk = tb_transaksi_proses.id_transaksi_masuk');
            $query = $this->db->get();
            return $query;
        }

        public function get_data($table){
            return $this->db->get($table);
        }

        public function insert_data($data, $table){
            $this->db->insert($table,$data);
        }

        public function delete_data($id_pelanggan)
        {
            $this->db->where('id_pelanggan', $id_pelanggan);
            return $this->db->delete('tb_pelanggan');
        }

        public function update_data($id)
        {
            return $this->db->get_where('tb_pelanggan', ['id_pelanggan' => $id])->row_array();
        }

        public function detail_data($id_pelanggan = NULL){
            $query = $this->db->get_where('tb_pelanggan',array('id_pelanggan'=> $id_pelanggan))->row();
            return $query;
        }

    } 
?>