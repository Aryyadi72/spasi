<div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Produk Sasirangan
                </h2>
                <div class="text-muted mt-1">Silahkan Pilih Produk Sasirangan yang Diinginkan!!!</div>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                  <div class="me-3">
                    <div class="input-icon">
                      <input type="hidden" value="" class="form-control" placeholder="Search…">
                      <span class="input-icon-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" hidden><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <?php 
                $no=1; 
                foreach($produk as $p) {
              ?>
              <div class="col-sm-6 col-lg-4">
                <div class="card card-sm">
                  <a href="<?= base_url('produk_pelanggan/detail_produk_pelanggan/'. $p->id_produk) ?>" class="d-block"><img src='<?= base_url() ?>./assets/upload/<?= $p->foto_sasirangan ?>' style="width:421px;height:350px" class="card-img-top"></a>
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <a href="<?= base_url('transaksi_pelanggan/transaksi?id='. $p->id_produk) ?>" class="btn btn btn-indigo w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Checkout Produk">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M7 10l5 -6l5 6"></path>
                            <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                            <path d="M12 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                          </svg>
                        </a>
                      </div>
                      <div class="" style="margin-left:5px;">
                        <?php echo anchor('keranjang/tambah_keranjang?id='. $p->id_produk, '<div class="btn btn btn-green w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Ke Keranjang">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 17h-11v-14h-2"></path>
                            <path d="M6 5l6 .429m7.138 6.573l-.143 1h-13"></path>
                            <path d="M15 6h6m-3 -3v6"></path>
                          </svg>
                        </div>') ?>
                      </div>
                      <div style="margin-left:15px;">
                        <div><?= $p->nama_sasirangan ?></div>
                        <div class="text-muted"><?= 'Rp ' . number_format($p->harga_produk, 2, ',', '.'); ?></div>
                      </div>
                      <div class="ms-auto">
                        <a href="#" class="text-muted">
                          <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path>
                          </svg>
                          <?= $p->stok ?>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                  }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title">Beli Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">

            <div class="mb-3">
              <label class="form-label">Jumlah</label>
              <input type="number" class="form-control" name="example-text-input" placeholder="Masukkan Jumlah" name="jumlah">
            </div>

            <input type="hidden" class="form-control" aria-describedby="emailHelp" name="id_produk" value="<?= $data ?>">

            <input type="hidden" class="form-control" aria-describedby="emailHelp" name="id_pelanggan" value="<?= $id_pelanggan ?>">

            <input type="hidden" class="form-control" aria-describedby="emailHelp" name="keterangan" value="Harga belum termasuk ongkir, ongkir akan di update setelah pesanan diterima oleh Kasir.">

            <input type="hidden" class="form-control" aria-describedby="emailHelp" name="status" value="Dikirim">

          </div>

          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-green" data-bs-dismiss="modal">Buat Transaksi</button> -->
          </div>

        </div>
      </div>
    </div>