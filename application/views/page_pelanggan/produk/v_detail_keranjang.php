<br><br>
<div class="container">
<div class="page-wrapper">
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                                $no=1; 
                                foreach($items as $i) :
                            ?>
                            <tr>
                                <td class="text-muted" data-label="No" >
                                    <?= $no++ ?>
                                </td>

                                <td data-label="Nama Produk" >
                                    <div class="d-flex py-1 align-items-center">
                                        <div class="flex-fill">
                                            <div class="font-weight-medium"><?= $i['name'] ?></div>
                                        </div>
                                    </div>
                                </td>

                                <td data-label="Jumlah" >
                                    <div class="text-muted"><?= $i['qty'] ?></div>
                                </td>

                                <td class="text-muted" data-label="Harga" >
                                    <?= $i['price'] ?>
                                </td>

                                <td class="text-muted" data-label="Total Harga" >
                                    <?php
                                        $total_harga =  $i['qty'] * $i['price'];
                                    ?>

                                    <?= $total_harga ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <form action="<?php echo base_url('transaksi_pelanggan/proses_tambah'); ?>" method="post" role="form">

            <?php foreach($items as $i) : ?>

            <input type="hidden" class="form-control" aria-describedby="emailHelp" placeholder="Jumlah" name="jumlah" value="<?= $i['qty'] ?>">

            <input type="hidden" class="form-control" aria-describedby="emailHelp" placeholder="Jumlah" name="total_harga" value="<?= $i['qty'] * $i['price'] ?>">

            <?php endforeach; ?>

            <input type="hidden" class="form-control" aria-describedby="emailHelp" name="id_produk" value="<?= $i['id'] ?>">

            <input type="hidden" class="form-control" aria-describedby="emailHelp" name="id_pelanggan" value="<?= $id_pelanggan ?>">

            <input type="hidden" class="form-control" aria-describedby="emailHelp" name="keterangan" value="Harga belum termasuk ongkir, ongkir akan di update setelah pesanan diterima oleh Kasir.">

            <input type="hidden" class="form-control" aria-describedby="emailHelp" name="status" value="Dikirim">

        </div>
    </div>
    
    <br><br>

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

    <button type="submit" class="btn btn-primary">Submit</button>

        </form>

</div>
</div>