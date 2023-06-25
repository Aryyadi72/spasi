<?php
    class M_produk extends CI_Model
    {
        public function show_data()
        {
            $this->db->select('*');
            $this->db->from('tb_produk');
            $this->db->join('tb_sasirangan','tb_sasirangan.id_sasirangan = tb_produk.id_sasirangan');
            $this->db->order_by('tanggal_ditambahkan', 'desc');
            $query = $this->db->get();
            return $query;
        }

        public function show_data_byid($id)
        {
            $this->db->select('*');
            $this->db->from('tb_produk');
            $this->db->join('tb_sasirangan', 'tb_sasirangan.id_sasirangan = tb_produk.id_sasirangan');
            // $this->db->join('tb_produk', 'tb_produk.id_produk = tb_ulasan.id_produk');
            $this->db->where('tb_produk.id_produk', $id);
            $query = $this->db->get()->row_array();
            return $query;
        }

        public function getInvoice($id)
        {
            $this->db->select('*');
            $this->db->from('tb_transaksi_masuk', 'tb_produk');
            $this->db->join('tb_produk', 'tb_produk.id_produk = tb_transaksi_masuk.id_produk');
            $this->db->join('tb_sasirangan', 'tb_sasirangan.id_sasirangan = tb_produk.id_sasirangan');
            $this->db->where('tb_transaksi_masuk.id_invoice', $id);
            $query = $this->db->get()->result_array();
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

        // public function getInvoice($id)
        // {
        //     return $this->db->get_where('tb_transaksi_masuk', ['id_transaksi_masuk' => $id])->row_array();
        // }

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

        public function get_total_harga_by_id_invoice($id_invoice)
        {
            $this->db->select('SUM(total_harga) as total_harga');
            $this->db->from('tb_transaksi_masuk');
            $this->db->where('id_invoice', $id_invoice);
            $query = $this->db->get();
            $result = $query->row();

            return $result->total_harga;
        }
    } 
?>