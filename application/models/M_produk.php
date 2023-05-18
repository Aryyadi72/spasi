<?php
    class M_produk extends CI_Model
    {
        public function show_data()
        {
            $this->db->select('*');
            $this->db->from('tb_produk');
            $this->db->join('tb_sasirangan','tb_sasirangan.id_sasirangan = tb_produk.id_sasirangan');      
            $query = $this->db->get();
            return $query;
        }
    } 
?>