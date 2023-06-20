<div class="container" style="padding-top:80px;">
    <div class="col-md-12">
        <form class="card" action="<?php echo base_url('keranjang/proses_tambah'); ?>" method="post" role="form">
            <div class="card-header">
                <h3 class="card-title">Checkout Produk</h3>
            </div>

            <div class="card-body">

                <input type="hidden" class="form-control" aria-describedby="emailHelp" name="id_produk" value="<?= $data ?>">

                <input type="hidden" class="form-control" aria-describedby="emailHelp" name="id_pelanggan" value="<?= $id_pelanggan ?>">

                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Jumlah</label>
                    <div class="col">
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Jumlah" name="jumlah">
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