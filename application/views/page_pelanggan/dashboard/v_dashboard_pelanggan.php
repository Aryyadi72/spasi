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
                          <th><button class="table-sort" data-sort="sort-date">Tanggal Pemesanan</button></th>
                          <th><button class="table-sort" data-sort="sort-total">Total Harga</button></th>
                          <th><button class="table-sort" data-sort="sort-ket">Keterangan</button></th>
                          <th><button class="table-sort" data-sort="sort-pelanggan">Jumlah</button></th>
                          <th><button class="table-sort" data-sort="sort-produk">Metode Pembayaran</button></th>
                          <th><button class="table-sort" data-sort="sort-produk">Metode Pengiriman</button></th>
                          <th><button class="table-sort" data-sort="sort-pelanggan">Status</button></th>
                          <th><button class="table-sort" data-sort="sort-aksi">Aksi</button></th>
                        </tr>
                      </thead>
                      <tbody class="table-tbody">
                        <tr>
                          <?php 
                            $no=1; 
                            foreach($transaksi as $tm) {
                          ?>
                          <td class="sort-no"><?= $no++ ?></td>
                          <td class="sort-date" data-date="1628071164"><?= $tm->tanggal_transakasi_masuk ?></td>
                          <td class="sort-total"><?= 'Rp ' . number_format($tm->total_harga, 0, ',', '.'); ?></td>
                          <td class="sort-ket"><?= $tm->keterangan ?></td>
                          <td class="sort-pelanggan"><?= $tm->jumlah ?></td>
                          <td class="sort-produk"><?= $tm->metode_pembayaran ?></td>
                          <td class="sort-produk"><?= $tm->metode_pengiriman ?></td>

                          <?php 
                            $status = $tm->status;
                            $badgeClass = '';
                              switch ($status) {
                                  case 'Selesai':
                                      $badgeClass = 'bg-green';
                                      break;
                                  case 'Proses':
                                      $badgeClass = 'bg-yellow';
                                      break;
                                  case 'Dibatalkan':
                                      $badgeClass = 'bg-red';
                                      break;
                                  default:
                                      $badgeClass = 'bg-blue';
                                      break;
                              }
                          ?>

                          <td style="margin:20px;padding:5px;" class="badge <?= $badgeClass; ?>"><?= $status ?></td>

                          <td>
                            <div class="row g-2 align-items-center">
                              <?php 
                                  $kirim = $tm->metode_pengiriman;
                                  $hrefClass = '';
                                  $clrbClass = '';
                                  $iconClass = '';
                                    switch ($kirim) {
                                        case 'Kirim ke Alamat Tujuan':
                                            $hrefClass = 'dashboard_pelanggan/lokasi_pengiriman';
                                            $clrbClass = 'btn btn-green w-100 btn-icon btn-sm';
                                            $iconClass = '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                                            <path d="M12.794 21.322a2 2 0 0 1 -2.207 -.422l-4.244 -4.243a8 8 0 1 1 13.59 -4.616"></path>
                                                            <path d="M16 19h6"></path>
                                                            <path d="M19 16v6"></path>
                                                          </svg>';
                                            break;
                                        default:
                                            break;
                                    }
                                ?>

                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto" style="">
                                  <a href="<?= $hrefClass; ?>" class="<?= $clrbClass; ?>">
                                    <?= $iconClass; ?>
                                  </a>
                                </div>

                              <?php 
                                  $bayar = $tm->metode_pembayaran;
                                  $hrefClass = '';
                                  $clrbClass = '';
                                  $iconClass = '';
                                    switch ($bayar) {
                                        case 'Transfer':
                                            $hrefClass = 'dashboard_pelanggan/file_struk/?id='. $tm->id_transaksi_masuk;
                                            $clrbClass = 'btn btn-red w-100 btn-icon btn-sm';
                                            $iconClass = '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2"></path>
                                                            <path d="M14 8h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5m2 0v1.5m0 -9v1.5"></path>
                                                          </svg>';
                                            break;
                                        default:
                                            break;
                                    }
                                ?>
                                <!-- Button Rating -->
                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                                  <a href="<?= $hrefClass; ?>" class="<?= $clrbClass; ?>">

                                    <?= $iconClass; ?>
                                    
                                  </a>
                                </div>

                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                                  <a href="<?= base_url('dashboard_pelanggan/invoice/'.$tm->id_transaksi_masuk) ?>" class="btn btn-green w-100 btn-icon btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-description" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                        <path d="M9 17h6"></path>
                                        <path d="M9 13h6"></path>
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