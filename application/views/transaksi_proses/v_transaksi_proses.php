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
                        <th><button class="table-sort" data-sort="sort-date">Date</button></th>
                        <th><button class="table-sort" data-sort="sort-total">Total Harga</button></th>
                        <th><button class="table-sort" data-sort="sort-ket">Keterangan</button></th>
                        <th><button class="table-sort" data-sort="sort-pelanggan">Pelanggan</button></th>
                        <th><button class="table-sort" data-sort="sort-produk">Produk</button></th>
                        <th><button class="table-sort" data-sort="sort-aksi">Aksi</button></th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <tr>
                        <td class="sort-no">1</td>
                        <td class="sort-date" data-date="1628071164">August 04, 2021</td>
                        <td class="sort-total">Rp.300.000</td>
                        <td class="sort-ket">Lorem ipsum dolor sit amet consectetur</td>
                        <td class="sort-pelanggan">Steel Vengeance</td>
                        <td class="sort-produk">Kain Sasirangan</td>
                        <td>
                          <div class="row g-2 align-items-center">
                          <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                            <a href="#" class="btn btn-teal w-100 btn-icon" data-bs-toggle="modal" data-bs-target="#modal-success">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
                              </svg>
                            </a>
                          </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal modal-blur fade" id="modal-success" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <div class="modal-status bg-success"></div>
                  <div class="modal-body text-center py-4">
                    <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 12l2 2l4 -4" /></svg>
                    <h3>Transaksi Masuk Telah Diselesaikan</h3>
                  </div>
                  <div class="modal-footer">
                    <div class="w-100">
                      <div class="row">
                        <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                            Kembali
                          </a></div>
                        <div class="col"><a href="#" class="btn btn-success w-100" data-bs-dismiss="modal">
                            Lihat Transksi Keluar
                          </a></div>
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