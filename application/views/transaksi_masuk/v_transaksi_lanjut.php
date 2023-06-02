<div class="container" style="padding-top:80px;">
  <div class="col-md-12">
    <form class="card" action="<?php echo base_url('transaksi_masuk/proses_transaksi/' . $transaksi['id_transaksi_masuk']); ?>" method="post" role="form">
        <div class="card-header">
          <h3 class="card-title">Transaksi</h3>
        </div>
        
        <div class="card-body">

          <input type="hidden" name="id_transaksi_masuk" value="<?php echo $transaksi['id_transaksi_masuk']; ?>">

              <div class="mb-3 row">
                  <label class="col-3">Keterangan</label>
                  <div class="col">
                      <textarea class="form-control" name="keterangan" cols="30" rows="10"><?= $transaksi['keterangan'] ?></textarea>
                    </div>
              </div>

              <div class="mb-3 row">
                <label class="col-3">Status</label>
                  <div class="col">
                      <input type="text" class="form-control" name="status" value="Proses">
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