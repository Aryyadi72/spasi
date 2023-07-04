<div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Data Produk
                </h2>
              </div>
              <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                <a href="<?= base_url('produk/tambah_produk')?>" class="btn btn-indigo w-100">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M8 20l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4h4z"></path>
                    <path d="M13.5 6.5l4 4"></path>
                    <path d="M16 18h4m-2 -2v4"></path>
                  </svg>
                    Tambah
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="card-body">
                <div id="table-default" class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th><button class="table-sort" data-sort="sort-no">Nomor</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Nama</button></th>
                        <th><button class="table-sort" data-sort="sort-city">Harga</button></th>
                        <th><button class="table-sort" data-sort="sort-type">Stok</button></th>
                        <th><button class="table-sort" data-sort="sort-score">Foto</button></th>
                        <th><button class="table-sort" data-sort="sort-level">Deskripsi</button></th>
                        <th><button class="table-sort">Aksi</button></th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <tr>
                        <?php 
                            $no=1; 
                            foreach($produk as $p) {
                        ?>
                        <td class="sort-no"><?= $no++ ?></td>
                        <td class="sort-name"><?= $p->nama_sasirangan ?></td>
                        <td class="sort-city"><?= 'Rp ' . number_format($p->harga_produk, 2, ',', '.'); ?></td>
                        <td class="sort-type"><?= $p->stok ?></td>
                        <td><img src='<?= base_url() ?>./assets/upload/<?= $p->foto_sasirangan ?>' style="width:100%;max-width:100px"></td>
                        <td class="sort-level"><?= $p->deskripsi_produk ?></td>
                        <td>
                          <div class="row g-2 align-items-center">
                          <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                            <a href="<?= base_url("produk/updateProduk/". $p->id_produk)?>" class="btn btn-yellow w-100 btn-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                <path d="M13.5 6.5l4 4"></path>
                              </svg>
                            </a>
                          </div>
                          <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                            <a href="<?= base_url("produk/deleteProduk/". $p->id_produk)?>" class="btn btn-red w-100 btn-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 7h16"></path>
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                <path d="M10 12l4 4m0 -4l-4 4"></path>
                              </svg>
                            </a>
                          </div>
                          </div>
                        </td>
                      </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
      document.addEventListener("DOMContentLoaded", function() {
      const list = new List('table-default', {
      	sortClass: 'table-sort',
      	listClass: 'table-tbody',
      	valueNames: [ 'sort-no', 'sort-name', 'sort-type', 'sort-city', 'sort-score',
      		{ attr: 'data-level', name: 'sort-date' },
      		{ attr: 'data-progress', name: 'sort-progress' }
      	]
      });
      })
    </script>