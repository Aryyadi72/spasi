<div class="container" style="padding-top:80px;">
    <div class="col-md-12">

        <form class="card" action="<?php echo base_url('dashboard_pelanggan/tambah_lokasi'); ?>" method="post" enctype="multipart/form-data" role="form">

            <div class="card-header">
                <h3 class="card-title">Upload Bukti Transfer</h3>
            </div>

            <div class="card-body">

                <input class="form-control" type="hidden" name="id_transaksi_masuk" value="<?= $a ?>">

                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Alamat Tujuan</label>
                    <div class="col">
                        <input class="form-control" type="text" name="alamat_tujuan" >
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Latlong</label>
                    <div class="col">
                        <input class="form-control" type="text" name="latlong" >
                    </div>
                </div>

            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>