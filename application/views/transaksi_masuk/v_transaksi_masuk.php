<div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Data Transaksi Masuk
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
                        <th><button class="table-sort" data-sort="sort-date">Tanggal Transaksi</button></th>
                        <th><button class="table-sort" data-sort="sort-ket">Metode Pembayaran</button></th>
                        <th><button class="table-sort" data-sort="sort-ket">Metode Pengiriman</button></th>
                        <th><button class="table-sort" data-sort="sort-pelanggan">Pelanggan</button></th>
                        <th><button class="table-sort" data-sort="sort-produk">Invoice</button></th>
                        <th><button class="table-sort" data-sort="sort-produk">Status</button></th>
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
                        <td class="sort-date"><?= $tm->tanggal_transakasi_masuk ?></td>
                        <td class="sort-ket"><?= $tm->metode_pembayaran ?></td>
                        <td class="sort-ket"><?= $tm->metode_pengiriman ?></td>
                        <td class="sort-pelanggan"><?= $tm->nama_pelanggan ?></td>
                        <td class="sort-produk"><?= $tm->id_invoice ?></td>

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

                        <td style="margin-bottom:5px;margin-top:10px;padding:5px;" class="badge <?= $badgeClass; ?>"><?= $status ?></td>
                        
                        <td>
                          <div class="row g-2 align-items-center">

                          <!-- Lokasi -->
                          <?php 
                                  $kirim = $tm->metode_pengiriman;
                                  $hrefClass = '';
                                  $clrbClass = '';
                                  $iconClass = '';
                                    switch ($kirim) {
                                        case 'Kirim ke Alamat Tujuan':
                                            $hrefClass = 'transaksi_masuk/lokasibyid/'.$tm->id_transaksi_masuk;
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

                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                                  <a href="<?= $hrefClass; ?>" class="<?= $clrbClass; ?>">
                                    <?= $iconClass; ?>
                                  </a>
                                </div>
                          <!-- Lokasi -->

                          <!-- Struk -->
                          <?php 
                                  $bayar = $tm->metode_pembayaran;
                                  $hrefClass = '';
                                  $clrbClass = '';
                                  $iconClass = '';
                                    switch ($bayar) {
                                        case 'Transfer':
                                            $hrefClass = 'transaksi_masuk/strukbyid/'.$tm->id_transaksi_masuk;
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
                          <!-- Struk -->

                          <!-- Detail -->
                            <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                              <a href="<?= base_url('transaksi_masuk/ubah_transaksi_masuk/' . $tm->id_transaksi_masuk)?>" class="btn btn-yellow w-100 btn-icon btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-hour-7" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                  <path d="M12 12l-2 3"></path>
                                  <path d="M12 7v5"></path>
                                </svg>
                              </a>
                            </div>
                          <!-- Detail -->

                          <!-- Detail -->
                            <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                              <a href="<?= base_url('transaksi_masuk/detail_invoice/' . $tm->id_invoice)?>" class="btn btn-indigo w-100 btn-icon btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-hour-7" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                  <path d="M12 12l-2 3"></path>
                                  <path d="M12 7v5"></path>
                                </svg>
                              </a>
                            </div>
                          </div>
                          <!-- Detail -->
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