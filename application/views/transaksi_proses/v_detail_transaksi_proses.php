<div class="container" style="padding-top:80px;">
    <div class="col-md-12">
        <form class="card" action="<?php echo base_url('transaksi_masuk/proses_tambah_keluar'); ?>" method="post" role="form">

            <div class="card-header">
                <h3 class="card-title">Transaksi</h3>
            </div>
            
            <div class="card-body">
                
                <div class="mb-3 row" hidden>
                    <label class="col-3">ID Transaksi Proses</label>
                    <div class="col">
                      <input type="text" class="form-control" aria-describedby="emailHelp" name="id_transaksi_proses" value="<?= $data ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-3">Tanggal Transaksi Masuk</label>
                    <div class="col">
                        <input type="text" class="form-control" aria-describedby="emailHelp" name="id_pengelola" disabled>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-3">Tanggal Transaksi Proses</label>
                    <div class="col">
                        <input type="text" class="form-control" aria-describedby="emailHelp" name="id_pengelola"  disabled>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-3">Nama Pengelola</label>
                    <div class="col">
                        <input type="text" class="form-control" aria-describedby="emailHelp" name="id_pengelola"  disabled>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-3">Nama Pelanggan</label>
                    <div class="col">
                        <input type="text" class="form-control" aria-describedby="emailHelp" name="id_pengelola"  disabled>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-3">Produk</label>
                    <div class="col">
                        <input type="text" class="form-control" aria-describedby="emailHelp" name="id_pengelola"  disabled>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-3">Jumlah</label>
                    <div class="col">
                        <input type="text" class="form-control" aria-describedby="emailHelp" name="id_pengelola"  disabled>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-3">Total Harga</label>
                    <div class="col">
                        <input type="text" class="form-control" aria-describedby="emailHelp" name="id_pengelola"  disabled>
                    </div>
                </div>

            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-green">Selesai</button>
            </div>
        </form>
    </div>
</div>