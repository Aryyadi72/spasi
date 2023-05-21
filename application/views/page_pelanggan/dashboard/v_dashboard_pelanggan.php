          <div class="page-wrapper">
            <div class="page-header d-print-none">
              <div class="container-xl">
                <div class="row g-2 align-items-center">

                  <div class="page-header d-print-none">
                    <div class="container-xl">
                      <div class="row g-2 align-items-center">
                        <div class="col">
                          <div class="page-pretitle">
                            Overview
                          </div>
                          <h2 class="page-title">
                            Dashboard
                          </h2>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                      <a href="#" class="btn btn-teal d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-spreadsheet" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                        <path d="M8 11h8v7h-8z"></path>
                        <path d="M8 15h8"></path>
                        <path d="M11 11v7"></path>
                      </svg>
                      Export Data Transaksi
                      </a>
                      <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                      </a>
                    </div>
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
                            <!-- Button Cetak Hasil Pembayaran -->
                            <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                              <a href="#" class="btn btn-red w-100 btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pdf" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M10 8v8h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-2z"></path>
                                  <path d="M3 12h2a2 2 0 1 0 0 -4h-2v8"></path>
                                  <path d="M17 12h3"></path>
                                  <path d="M21 8h-4v8"></path>
                                </svg>
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
                                </svg>
                              </a>
                            </div>
                            <!-- Button Rating -->
                            <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                              <a href="#" class="btn btn-yellow w-100 btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" stroke-width="0" fill="currentColor"></path>
                                </svg>
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
                </div>
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Ulasan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-1" style="height:70px;">
              <label class="form-label">Rating</label>
              <input type="range" class="form-range mb-2" value="30" min="0" max="50" step="10">
              <div class="form-range mb-2" id="range-simple"></div>
              <div class="form-range mb-2" id="range-connect"></div>
              <div class="form-range mb-2 text-green" id="range-color"></div>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Deskripsi</label>
              <textarea class="form-control"
							  rows="5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui facilis id omnis soluta delectus nihil provident sed, commodi fugiat, optio esse molestias cumque totam perferendis dolorem? Cum odio eos ab.</textarea>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
              Cancel
            </a>
            <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
              Tambahkan Ulasan
            </a>
          </div>
        </div>
      </div>
    </div>