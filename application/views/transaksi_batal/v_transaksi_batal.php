<div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Data Transaksi Batal
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
                        <th><button class="table-sort" data-sort="sort-qty">Jumlah</button></th>
                        <th><button class="table-sort" data-sort="sort-date">Tanggal Transaksi</button></th>
                        <th><button class="table-sort" data-sort="sort-total">Total Harga</button></th>
                        <th><button class="table-sort" data-sort="sort-ket">Keterangan</button></th>
                        <th><button class="table-sort" data-sort="sort-pelanggan">Pelanggan</button></th>
                        <th><button class="table-sort" data-sort="sort-produk">Produk</button></th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <tr>
                        <?php 
                          $no=1; 
                          foreach($batal as $tm) {
                        ?>
                        <td class="sort-no"><?= $no++ ?></td>
                        <td class="sort-qty"><?= $tm->jumlah ?></td>
                        <td class="sort-date"><?= $tm->tanggal_transakasi_masuk ?></td>
                        <td class="sort-total"><?= 'Rp ' . number_format($tm->total_harga, 2, ',', '.'); ?></td>
                        <td class="sort-ket"><?= $tm->keterangan ?></td>
                        <td class="sort-pelanggan"><?= $tm->nama ?></td>
                        <td class="sort-produk"><?= $tm->nama_sasirangan ?></td>
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