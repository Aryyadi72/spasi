<div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Data Transaksi Keluar
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
                        <th><button class="table-sort" data-sort="sort-total">Tanggal Transaksi Selesai</button></th>
                        <!-- <th><button class="table-sort" data-sort="sort-ket">Kasir</button></th>
                        <th><button class="table-sort" data-sort="sort-pelanggan">Jumlah</button></th>
                        <th><button class="table-sort" data-sort="sort-produk">Total Harga</button></th>
                        <th><button class="table-sort" data-sort="sort-kasir">Produk</button></th> -->
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <tr>
                        <?php $no=1; foreach($tselesai as $s) { ?>
                        <td class="sort-no"><?= $no++ ?></td>
                        <td class="sort-total"><?= $s->tanggal_transaksi_proses ?></td>
                        <td class="sort-date"><?= $s->tanggal_transaksi_keluar ?></td>
                      </tr>
                      <?php } ?>
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
      	valueNames: [ 'sort-no', 'sort-total', 'sort-ket', 'sort-pelanggan', 'sort-produk', 'sort-kasir',
      		{ attr: 'data-date', name: 'sort-date' },
      		{ attr: 'data-progress', name: 'sort-progress' },
      		'sort-quantity'
      	]
      });
      })
    </script>