<div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Data Transaksi Diproses
                </h2>
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
                        <th><button class="table-sort" data-sort="sort-No">No</button></th>
                        <th><button class="table-sort" data-sort="sort-date">Tanggal Transaksi Diproses</button></th>
                        <th><button class="table-sort" data-sort="sort-total">Tanggal Transaksi Masuk</button></th>
                        <th><button class="table-sort" data-sort="sort-ket">Nama Pengelola</button></th>
                        <th><button class="table-sort" data-sort="sort-aksi">Aksi</button></th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <tr>
                        <?php 
                          $no=1; 
                          foreach($transaksi as $tp) {
                        ?>
                        <td class="sort-no"><?= $no++ ?></td>
                        <td class="sort-date"><?= $tp->tanggal_transaksi_proses?></td>
                        <td class="sort-ket"><?= $tp->tanggal_transakasi_masuk ?></td>
                        <td class="sort-total"><?= $tp->nama ?></td>
                        <td>
                          <div class="row g-2 align-items-center">
                          <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                            <a href="<?= base_url('transaksi_masuk/transaksi_selesai/' . $tp->id_transaksi_masuk)?>" class="btn btn-teal w-100 btn-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
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
      	valueNames: [ 'sort-no', 'sort-total', 'sort-ket', 'sort-pelanggan', 'sort-produk',
      		{ attr: 'data-date', name: 'sort-date' },
      		{ attr: 'data-progress', name: 'sort-progress' },
      		'sort-quantity'
      	]
      });
      })
    </script>