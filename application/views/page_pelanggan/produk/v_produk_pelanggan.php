<div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Gallery
                </h2>
                <div class="text-muted mt-1">1-12 of 241 photos</div>
              </div>
              <!-- Page title actions -->
              <!-- <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                  <div class="me-3">
                    <div class="input-icon">
                      <input type="text" value="" class="form-control" placeholder="Search…">
                      <span class="input-icon-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                      </span>
                    </div>
                  </div>
                </div>
              </div> -->
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
                  <a href="<?= base_url('produk_pelanggan/detail_produk_pelanggan') ?>" class="d-block"><img src='<?= base_url() ?>./assets/upload/<?= $p->foto_sasirangan ?>' style="width:421px;height:350px" class="card-img-top"></a>
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <!-- <a href="#" class="btn btn btn-indigo w-100 btn-icon" data-bs-toggle="modal" data-bs-target="#modal-simple"> -->
                        <a href="#" class="btn btn btn-indigo w-100 btn-icon" data-bs-toggle="modal" data-bs-target="#modal-simple">
                          <!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M7 10l5 -6l5 6"></path>
                            <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                            <path d="M12 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                          </svg>
                        </a>
                      </div>
                      <div style="margin-left:15px;">
                        <div><?= $p->nama_sasirangan ?></div>
                        <div class="text-muted"><?= $p->harga_produk ?></div>
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
            <!-- <div class="d-flex" style="padding-top:30px;margin-bottom:-30px;">
              <ul class="pagination ms-auto">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
                    prev
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">
                    next
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                  </a>
                </li>
              </ul>
            </div> -->
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
              <input type="text" class="form-control" name="example-text-input" placeholder="Masukkan Jumlah">
            </div>
            <div class="mb-3">
              <label class="form-label">Total Harga</label>
              <input type="text" class="form-control" name="example-disabled-input" placeholder="Disabled..." value="Total Harga" disabled>
            </div>
            <div class="mb-3">
              <label class="form-label">Keterangan</label>
              <textarea class="form-control" rows="5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis magnam perspiciatis suscipit nam non, voluptate a. Et, ex possimus libero molestiae, suscipit ducimus atque minus distinctio, natus cum ab nisi?</textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-green" data-bs-dismiss="modal">Buat Transaksi</button>
          </div>
        </div>
      </div>
    </div>