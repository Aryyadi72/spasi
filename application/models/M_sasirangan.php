<?php
    class M_sasirangan extends CI_Model{
        
        public function show_data()
        {
            return $this->db->query('SELECT * FROM tb_sasirangan');
        }

        public function get_data($table){
            return $this->db->get($table);
        }

        public function insert_data($data, $table){
            $this->db->insert($table,$data);
        }

        public function delete_data($id_sasirangan)
        {
            $this->db->where('id_sasirangan', $id_sasirangan);
            return $this->db->delete('tb_sasirangan');
        }

        public function update_data($id)
        {
            return $this->db->get_where('tb_sasirangan', ['id_sasirangan' => $id])->row_array();
        }

        public function detail_data($id_sasirangan = NULL){
            $query = $this->db->get_where('tb_sasirangan',array('id_sasirangan'=> $id_sasirangan))->row();
            return $query;
        }

        public function getTotalSasirangan()
        {
            $query = $this->db->get('tb_sasirangan');
            return $query->num_rows();
        }

        public function getTotalProduk()
        {
            $query = $this->db->get('tb_produk');
            return $query->num_rows();
        }

        public function getTotalMasuk()
        {
            $query = $this->db->get('tb_transaksi_masuk');
            return $query->num_rows();
        }

        public function getTotalSelesai()
        {
            $query = $this->db->get('tb_transaksi_keluar');
            return $query->num_rows();
        }

    } 
?>