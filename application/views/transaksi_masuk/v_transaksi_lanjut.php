<div class="container" style="padding-top:80px;">
<div class="col-md-12">
              <form class="card" action="<?php echo base_url('transaksi_masuk/proses_tambah'); ?>" method="post" role="form">
                <div class="card-header">
                  <h3 class="card-title">Transaksi</h3>
                </div>
                <div class="card-body">

                  <div class="mb-3 row">
                    <label class="col-3">ID Pengelola</label>
                    <div class="col">
                      <input type="text" class="form-control" aria-describedby="emailHelp" name="id_pengelola" value="<?= $id_pengelola ?>">
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-3">ID Transaksi Masuk</label>
                    <div class="col">
                      <input type="text" class="form-control" aria-describedby="emailHelp" name="id_transaksi_masuk" value="<?= $data ?>">
                    </div>
                  </div>

                </div>

                <div class="card-footer text-end">
                  <button type="submit" class="btn btn-yellow">Proses</button>
                </form>
                <a type="submit" href="<?php echo base_url('transaksi_masuk/proses_batal'); ?>" class="btn btn-danger">Batal</a>
                </div>
            </div>
            </div>