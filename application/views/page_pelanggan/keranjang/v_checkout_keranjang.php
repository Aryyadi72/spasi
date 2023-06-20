<div class="container" style="padding-top:80px;">
    <div class="col-md-12">
        <form class="card" action="<?php echo base_url('keranjang/keranjang_transaksi_masuk/' . $data['id_keranjang']); ?>" method="post" role="form">
            <div class="card-header">
                <h3 class="card-title">Checkout Produk</h3>
            </div>

            <div class="card-body">

                <input type="hidden" name="id_keranjang" value="<?= $data['id_keranjang']; ?>">

                <input type="hidden" class="form-control" aria-describedby="emailHelp" name="id_produk" value="<?= $data['id_produk'] ?>">

                <input type="hidden" class="form-control" aria-describedby="emailHelp" name="id_pelanggan" value="<?= $data['id_pelanggan'] ?>">

                <input type="hidden" class="form-control" aria-describedby="emailHelp" name="jumlah" value="<?= $data['jumlah'] ?>">

                <input type="hidden" class="form-control" aria-describedby="emailHelp" name="total_harga" value="<?= $data['total_harga'] ?>">

                <input type="hidden" class="form-control" aria-describedby="emailHelp" name="keterangan" value="Harga belum termasuk ongkir, ongkir akan di update setelah pesanan diterima oleh Kasir.">

                <input type="hidden" class="form-control" aria-describedby="emailHelp" name="status" value="Dikirim">

                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Metode Pembayaran</label>
                    <div class="col">
                        <select class="form-select" name="metode_pembayaran">
                            <option selected disabled>Pilih Metode Pembayaran</option>
                            <option value="Cash">Cash</option>
                            <option value="Transfer">Transfer</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Metode Pengiriman</label>
                    <div class="col">
                        <select class="form-select" name="metode_pengiriman">
                            <option selected disabled>Pilih Metode Pengiriman</option>
                            <option value="Ambil di Tempat">Ambil di Tempat</option>
                            <option value="Kirim ke Alamat Tujuan">Kirim ke Alamat Tujuan</option>
                        </select>
                    </div>
                </div>

            </div>

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <!-- <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-success">Submit</a> -->
                </div>
        </form>
    </div>
</div>