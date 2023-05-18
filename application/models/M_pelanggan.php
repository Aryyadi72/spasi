<?php
    class M_pelanggan extends CI_Model{
        public function show_data()
        {
            return $this->db->query('SELECT * FROM tb_pelanggan');
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