<?php
    class M_pengelola extends CI_Model{
        public function show_data()
        {
            return $this->db->query('SELECT * FROM tb_pengelola');
        }

        public function get_data($table){
            return $this->db->get($table);
        }

        public function insert_data($data, $table){
            $this->db->insert($table,$data);
        }

        public function delete_data($id_pengelola)
        {
            $this->db->where('id_pengelola', $id_pengelola);
            return $this->db->delete('tb_pengelola');
        }

        public function update_data($id)
        {
            return $this->db->get_where('tb_pengelola', ['id_pengelola' => $id])->row_array();
        }

        public function detail_data($id_pengelola = NULL){
            $query = $this->db->get_where('tb_pengelola',array('id_pengelola'=> $id_pengelola))->row();
            return $query;
        }

    } 
?>