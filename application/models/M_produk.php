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

        public function delete_data($id_produk)
        {
            $this->db->where('id_produk', $id_produk);
            return $this->db->delete('tb_produk');
        }

        public function update_data($id)
        {
            return $this->db->get_where('tb_produk', ['id_produk' => $id])->row_array();
        }

        public function get_data()
        {
            $query = $this->db->get('tb_sasirangan');
            return $query->result();
        }

        public function find($id)
        {
            $result = $this->db->where('id_produk', $id)
                                -> limit(1)
                                -> get('tb_produk');
            if($result->num_rows() > 0){
                return $result->row();
            } else {
                return array();
            }
        }
    } 
?>