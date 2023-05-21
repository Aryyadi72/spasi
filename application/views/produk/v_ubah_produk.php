<div class="container" style="padding-top:80px;">
<div class="card">
<div class="col-md-12">
              <form action="<?php echo base_url('produk/proses_ubah/' . $produk['id_produk']); ?>" method="post" role="form">
                <div class="card-header">
                  <h3 class="card-title">Ubah Data Produk</h3>
                </div>
                <div class="card-body">

                  <input type="hidden" name="id_produk" value="<?php echo $produk['id_produk']; ?>">

                  <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Harga Produk</label>
                    <div class="col">
                      <input type="text" class="form-control" aria-describedby="emailHelp" name="harga_produk" value="<?= $produk['harga_produk'] ?>">
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Deskripsi</label>
                    <div class="col">
                      <input type="text" class="form-control" aria-describedby="emailHelp" name="deskripsi_produk" value="<?= $produk['deskripsi_produk'] ?>">
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Stok</label>
                    <div class="col">
                      <input type="text" class="form-control" aria-describedby="emailHelp" name="stok" value="<?= $produk['stok'] ?>">
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Sasirangan</label>
                    <div class="col">
                      <input type="text" class="form-control" aria-describedby="emailHelp" name="id_sasirangan" value="<?= $produk['id_sasirangan'] ?>">
                    </div>
                  </div>

                </div>
                <div class="card-footer text-end">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
            </div>