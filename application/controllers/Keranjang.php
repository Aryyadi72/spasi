<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function indexas($id)
	{
		$title['title'] = "Detail Keranjang - SPASI";
        $data['keranjang'] = $this->M_keranjang->show_data($id);

        $id_pelanggan = $this->session->userdata('id_pelanggan');
		$dataCount['username'] = $this->db->get_where('tb_pelanggan', ['id_pelanggan' => $id_pelanggan])->row_array();
        $dataCount['total'] = $this->M_keranjang->getTotalKeranjang($id_pelanggan);

		$this->load->view('page_pelanggan/templates/header', $title);
        $this->load->view('page_pelanggan/templates/navbar', $dataCount);
        $this->load->view('page_pelanggan/produk/v_detail_keranjang', $data);
        $this->load->view('page_pelanggan/templates/footer');
	}

    public function tambah_keranjang()
	{
		$this->load->library('session');
		$title['title'] = "Tambah Keranjang - SPASI";
		$data['data'] = $this->input->get('id');
		$data['id_pelanggan'] = $this->session->userdata('id_pelanggan');

		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$dataCount['username'] = $this->db->get_where('tb_pelanggan', ['id_pelanggan' => $id_pelanggan])->row_array();
        $dataCount['total'] = $this->M_keranjang->getTotalKeranjang($id_pelanggan);

		$this->load->view('page_pelanggan/templates/header', $title);
        $this->load->view('page_pelanggan/templates/navbar', $dataCount);
        $this->load->view('page_pelanggan/keranjang/v_tambah_keranjang', $data);
        $this->load->view('page_pelanggan/templates/footer');
	}

    public function proses_tambah()
	{
		$jumlah 					= $this->input->post('jumlah');
		$total_harga 				= $this->input->post('total_harga');
		$id_pelanggan 				= $this->input->post('id_pelanggan');
		$id_produk 					= $this->input->post('id_produk');

		$harga_satuan = $this->db->get_where('tb_produk', array('id_produk' => $id_produk))->row()->harga_produk;
		
		$total_harga = $jumlah * $harga_satuan;

		$data = array(
			'jumlah' 					=> $jumlah,
            'total_harga' 				=> $total_harga,
			'id_pelanggan' 				=> $id_pelanggan,
			'id_produk' 				=> $id_produk,
        );
        
		$result = $this->M_keranjang->tambahKeranjang($data);
        
        if ($result) {
            // Pesanan berhasil ditambahkan
            redirect('produk_pelanggan');
        } else {
            // Gagal menambahkan pesanan
            echo 'Gagal menambahkan pesanan.';
        }
	}

    public function checkout_keranjang($id)
    {
		$title['title'] = "Checkout Produk - SPASI";
        $data['data'] = $this->M_keranjang->getData($id);

		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$dataCount['username'] = $this->db->get_where('tb_pelanggan', ['id_pelanggan' => $id_pelanggan])->row_array();
        $dataCount['total'] = $this->M_keranjang->getTotalKeranjang($id_pelanggan);

		$this->load->view('page_pelanggan/templates/header', $title);
        $this->load->view('page_pelanggan/templates/navbar', $dataCount);
        $this->load->view('page_pelanggan/keranjang/v_checkout_keranjang', $data);
        $this->load->view('page_pelanggan/templates/footer');
    }

    public function keranjang_transaksi_masuk($id)
    {
        $tanggal_transakasi_masuk   = date('Y-m-d');
		$jumlah 					= $this->input->post('jumlah');
		$total_harga 				= $this->input->post('total_harga');
		$keterangan 				= $this->input->post('keterangan');
		$id_pelanggan 				= $this->input->post('id_pelanggan');
		$id_produk 					= $this->input->post('id_produk');
		$metode_pembayaran 			= $this->input->post('metode_pembayaran');
		$metode_pengiriman 			= $this->input->post('metode_pengiriman');
		$status 					= $this->input->post('status');
		$invoiceNumber 				= uniqid('TMS-');

                $data = array(
                    'jumlah' 			        => $jumlah,
                    'total_harga' 		        => $total_harga,
                    'id_pelanggan'              => $id_pelanggan,
					'id_produk ' 	            => $id_produk ,
					'tanggal_transakasi_masuk' 	=> $tanggal_transakasi_masuk,
					'metode_pembayaran' 		=> $metode_pembayaran,
                    'metode_pengiriman' 		=> $metode_pengiriman,
                    'keterangan' 		        => $keterangan,
                    'status' 		            => $status,
					'id_invoice' 		        => $invoiceNumber
                );
                $this->db->insert('tb_transaksi_masuk', $data);

        $this->db->where('id_keranjang', $id);
        $this->db->delete('tb_keranjang');
        
        redirect('dashboard_pelanggan');
    }

	public function checkout_banyak()
	{
		// Ambil id_pelanggan dari session
		$selectedItems = $this->input->post('selected_items');
		$id_pelanggan = $this->session->userdata('id_pelanggan');

		$tanggal_transakasi_masuk   = date('Y-m-d');
		$keterangan   				= 'Harga belum termasuk ongkir, ongkir akan di update setelah pesanan diterima oleh Kasir.';
		$status   					= 'Dikirim';
		$metode_pembayaran   		= $this->input->post('metode_pembayaran');
		$metode_pengiriman   		= $this->input->post('metode_pengiriman');
		$invoiceNumber 				= random_int(1000, 9999);

		// Ambil data dari tabel "keranjang" berdasarkan "id_pelanggan"
		// $this->db->where('id_pelanggan', $id_pelanggan);
		// $query = $this->db->get('tb_keranjang');
		// $keranjang = $query->result_array();

		// Buat array data untuk diinsert ke tabel "transaksi_masuk"
		// $data_transaksi_masuk = [];

		// var_dump($selectedItems);
		// exit;

		foreach ($selectedItems as $itemId) {

			$item = $this->M_keranjang->getKeranjangById($itemId);
			$data_transaksi_masuk = [];
			$data_transaksi_masuk[] = array(
				'id_pelanggan' 				=> $id_pelanggan,
				'id_produk' 				=> $item['id_produk'],
				'total_harga' 				=> $item['total_harga'],
				'jumlah' 					=> $item['jumlah'],
				'tanggal_transakasi_masuk' 	=> $tanggal_transakasi_masuk,
				'metode_pembayaran' 		=> $metode_pembayaran,
				'metode_pengiriman' 		=> $metode_pengiriman,
				'keterangan' 				=> $keterangan,
				'status' 					=> $status,
				'id_invoice' 		        => $invoiceNumber
				// Tambahkan field lainnya sesuai kebutuhan
			);

			// var_dump($data_transaksi_masuk);
			// exit;

			$this->db->insert_batch('tb_transaksi_masuk', $data_transaksi_masuk);
		}

		// $this->db->where('id_pelanggan', $id_pelanggan);
        // $this->db->delete('tb_keranjang');

		// Lakukan multiple insert ke tabel "transaksi_masuk"
		// var_dump($selectedItems);
		// exit;
		
		$this->M_keranjang->deleteSelectedItems($selectedItems);
		redirect('dashboard_pelanggan');

	}
}
