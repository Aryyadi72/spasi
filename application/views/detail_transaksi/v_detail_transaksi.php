<div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Data Detail Transaksi
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
                        <th><button class="table-sort" data-sort="sort-date">Date</button></th>
                        <th><button class="table-sort" data-sort="sort-total">Total Harga</button></th>
                        <th><button class="table-sort" data-sort="sort-ket">Keterangan</button></th>
                        <th><button class="table-sort" data-sort="sort-pelanggan">Pelanggan</button></th>
                        <th><button class="table-sort" data-sort="sort-produk">Produk</button></th>
                        <th><button class="table-sort" data-sort="sort-kasir">Kasir</button></th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <tr>
                        <td class="sort-no">1</td>
                        <td class="sort-date" data-date="1628071164">August 05, 2021</td>
                        <td class="sort-total">Rp.300.000</td>
                        <td class="sort-ket">Lorem ipsum dolor sit amet consectetur</td>
                        <td class="sort-pelanggan">Steel Vengeance</td>
                        <td class="sort-produk">Kain Sasirangan</td>
                        <td class="sort-kasir">Fury 325</td>
                      </tr>
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