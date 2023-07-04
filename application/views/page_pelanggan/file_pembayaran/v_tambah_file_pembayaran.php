<div class="container" style="padding-top:80px;">
    <div class="col-md-12">

        <form class="card" action="<?php echo base_url('dashboard_pelanggan/proses_tambah'); ?>" method="post" enctype="multipart/form-data" role="form">

            <div class="card-header">
                <h3 class="card-title">Upload Bukti Transfer</h3>
            </div>

            <div class="card-body">

                <input class="form-control" type="hidden" name="id_transaksi_masuk" value="<?= $a ?>">

                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Upload Gambar</label>
                    <div class="col">
                        <input class="form-control" type="file" id="formFile" name="userfile" accept="/image/*">
                    </div>
                </div>

                <p class="text-muted small lh-base">* Transfer ke 031-00-XXXXXXX-X an Admin</p>

            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>