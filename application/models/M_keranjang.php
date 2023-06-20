<?php

    class M_keranjang extends CI_Model
    {
        public function show_data($id)
        {
            $this->db->select('*');
            $this->db->from('tb_keranjang', 'tb_produk');
            $this->db->join('tb_pelanggan','tb_pelanggan.id_pelanggan = tb_keranjang.id_pelanggan');
            $this->db->join('tb_produk','tb_produk.id_produk = tb_keranjang.id_produk');
            $this->db->join('tb_sasirangan','tb_sasirangan.id_sasirangan = tb_produk.id_sasirangan');
            $this->db->where('tb_keranjang.id_pelanggan', $id);
            $query = $this->db->get()->result_array();
            return $query;
        }

        public function getData($id)
        {
            return $this->db->get_where('tb_keranjang', ['id_keranjang' => $id])->row_array();
        }

        public function tambahKeranjang($data) 
        {
            return $this->db->insert('tb_keranjang', $data);
        }

        public function getTotalKeranjang($id_pelanggan)
        {
            $this->db->where('id_pelanggan', $id_pelanggan);
            $query = $this->db->get('tb_keranjang');
            return $query->num_rows();
        }

        public function getKeranjangById($itemId)
        {
            $this->db->where('id_keranjang', $itemId);
            return $this->db->get('tb_keranjang')->row_array();
        }

        public function deleteSelectedItems($selectedItems)
        {
            $this->db->where_in('id_keranjang', $selectedItems);
            $this->db->delete('tb_keranjang');
        }
    }

?>