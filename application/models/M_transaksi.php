<?php
    class M_transaksi extends CI_Model
    {
        public function show_data()
        {
            $this->db->select('*');
            $this->db->from('tb_transaksi_masuk');
            $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_transaksi_masuk.id_pelanggan');
            $this->db->join('tb_produk', 'tb_produk.id_produk = tb_transaksi_masuk.id_produk');
            $this->db->join('tb_sasirangan', 'tb_sasirangan.id_sasirangan = tb_produk.id_sasirangan');
            $this->db->where('tb_transaksi_masuk.id_transaksi_masuk IN (SELECT MIN(id_transaksi_masuk) FROM tb_transaksi_masuk GROUP BY id_invoice)');
            $query = $this->db->get();
            return $query;
        }

        public function show_data_proses()
        {
            $this->db->select('*');
            $this->db->from('tb_transaksi_proses');
            $this->db->join('tb_pengelola','tb_pengelola.id_pengelola = tb_transaksi_proses.id_pengelola');
            $this->db->join('tb_transaksi_masuk','tb_transaksi_masuk.id_transaksi_masuk = tb_transaksi_proses.id_transaksi_masuk');
            $this->db->where('tb_transaksi_proses.id_transaksi_masuk IN (SELECT MIN(id_transaksi_masuk) FROM tb_transaksi_masuk GROUP BY id_invoice)');
            $query = $this->db->get();
            return $query;
        }

        public function show_data_selesai()
        {
            $this->db->select('*');
            $this->db->from('tb_transaksi_keluar', 'tb_transaksi_proses', 'tb_transaksi_masuk', 'tb_produk');
            $this->db->join('tb_transaksi_proses','tb_transaksi_proses.id_transaksi_proses = tb_transaksi_keluar.id_transaksi_proses');
            $this->db->join('tb_transaksi_masuk','tb_transaksi_masuk.id_transaksi_masuk = tb_transaksi_proses.id_transaksi_masuk');
            $this->db->join('tb_pengelola','tb_pengelola.id_pengelola = tb_transaksi_proses.id_pengelola');
            $this->db->join('tb_pelanggan','tb_pelanggan.id_pelanggan = tb_transaksi_masuk.id_pelanggan');
            $this->db->join('tb_produk','tb_produk.id_produk = tb_transaksi_masuk.id_produk');
            $this->db->join('tb_sasirangan','tb_sasirangan.id_sasirangan = tb_produk.id_sasirangan');
            $query = $this->db->get();
            return $query;
        }

        public function masuk_detail()
        {
            $this->db->select('*');
            $this->db->from('tb_transaksi_masuk');
            $this->db->join('tb_struk','tb_transaksi_masuk.id_transaksi_masuk = tb_struk.id_transaksi_masuk');
            $this->db->join('tb_titik_pengiriman','tb_transaksi_masuk.id_transaksi_masuk = tb_titik_pengiriman.id_transaksi_masuk');
            $query = $this->db->get();
            return $query;
        }

        public function masuk_detail_a()
        {
            $this->db->select('*');
            $this->db->from('tb_titik_pengiriman');
            $this->db->join('tb_transaksi_masuk','tb_transaksi_masuk.id_transaksi_masuk = tb_titik_pengiriman.id_transaksi_masuk');
            $query = $this->db->get();
            return $query;
        }

        public function get_data($table){
            $query = $this->db->get('tb_transaksi_masuk');
            return $query;
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

        public function data_byinvoice($id)
        {
            $this->db->select('*');
            $this->db->from('tb_transaksi_masuk');
            $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_transaksi_masuk.id_pelanggan');
            $this->db->join('tb_produk', 'tb_produk.id_produk = tb_transaksi_masuk.id_produk');
            $this->db->join('tb_sasirangan', 'tb_sasirangan.id_sasirangan = tb_produk.id_sasirangan');
            $this->db->where('tb_transaksi_masuk.id_invoice', $id);
            $query = $this->db->get()->result_array();
            return $query;
        }

        public function update_transaksi($id)
        {
            return $this->db->get_where('tb_transaksi_masuk', ['id_transaksi_masuk' => $id])->row_array();
        }

        public function detail_data($id_pelanggan = NULL){
            $query = $this->db->get_where('tb_pelanggan',array('id_pelanggan'=> $id_pelanggan))->row();
            return $query;
        }

        public function tambahTransaksi($data) 
        {
            return $this->db->insert('tb_transaksi_masuk', $data);
            // $this->kurangiStokProduk($data['id_produk'], $data['jumlah']);
            // return true;
        }
    
        // private function kurangiStokProduk($id_produk, $jumlah) 
        // {
        //     $this->db->select('stok');
        //     $this->db->where('id_produk', $id_produk);
        //     $query = $this->db->get('tb_produk');
        //     $row = $query->row();
            
        //     $stok_baru = $row->stok - $jumlah;
            
        //     $this->db->where('id_produk', $id_produk);
        //     $this->db->update('tb_produk', ['stok' => $stok_baru]);
        // }

        public function tambahTransaksiMasukKeDiproses($data) {
            
            // Simpan transaksi masuk ke dalam tabel transaksi diproses
            $this->db->insert('tb_transaksi_proses', $data);
            
            // Hapus data transaksi masuk dari tabel transaksi masuk
            $this->db->delete('tb_transaksi_masuk', array('id_transaksi_masuk' => $data['id_transaksi_masuk']));
            
            // Periksa apakah transaksi berhasil ditambahkan dan data transaksi masuk berhasil dihapus
            $success = ($this->db->affected_rows() > 0);
            
            return $success;
        }

        public function lokasibyid($id)
        {
            return $this->db->get_where('tb_titik_pengiriman', ['id_titik_pengiriman' => $id])->row_array();
        }

        public function strukbyid($id)
        {
            return $this->db->get_where('tb_struk', ['id_struk' => $id])->row_array();
        }

        public function show_data_dashpel($id_pelanggan)
        {
            $this->db->select('tb_transaksi_masuk.*, tb_produk.harga_produk');
            $this->db->from('tb_transaksi_masuk');
            $this->db->join('tb_produk', 'tb_produk.id_produk = tb_transaksi_masuk.id_produk');
            $this->db->where('tb_transaksi_masuk.id_pelanggan', $id_pelanggan);
            
            return $this->db->get()->result();
        }


    } 
?>