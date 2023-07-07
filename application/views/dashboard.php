
      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
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
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <div class="col-12">
                <div class="row row-cards">
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?= $total ?> Jenis Sasirangan
                            </div>
                            <div class="text-muted">
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?= $totalproduk ?> Produk
                            </div>
                            <div class="text-muted">
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" /></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?= $totalmasuk ?> Transaksi Masuk
                            </div>
                            <div class="text-muted">
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?= $totalselesai ?> Transaksi Selesai
                            </div>
                            <div class="text-muted">
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                          <li class="nav-item">
                            <a href="#tabs-home-7" class="nav-link active" data-bs-toggle="tab">Tab Transaksi Masuk</a>
                          </li>
                          <li class="nav-item">
                            <a href="#tabs-profile-7" class="nav-link" data-bs-toggle="tab">Tab Transaksi Keluar</a>
                          </li>
                          <li class="nav-item ms-auto">
                            <a href="#tabs-settings-7" class="nav-link" title="Settings" data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/settings -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /></svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                      <div class="card-body">
                        <div class="tab-content">
                          <div class="tab-pane active show" id="tabs-home-7">
                            <h4>Tab Transaksi Masuk</h4><br>
                              <form action="<?php echo base_url('Export_laporan'); ?>" method="get">
                                <table border="0" cellspacing="5" cellpadding="5">
                                  <tbody>
                                    <tr>
                                      <td>Minimum date:</td>
                                      <td><input type="text" id="min" name="min"></td>
                                    </tr>
                                    <tr>
                                      <td>Maximum date:</td>
                                      <td><input type="text" id="max" name="max"></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <br>
                                <div class="col-auto ms-auto d-print-none">
                                  <div class="btn-list">
                                    <button type="submit" class="btn btn-teal d-none d-sm-inline-block">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-spreadsheet" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                        <path d="M8 11h8v7h-8z"></path>
                                        <path d="M8 15h8"></path>
                                        <path d="M11 11v7"></path>
                                      </svg>  
                                      Export to Excel
                                    </button>
                                  </div>
                                </div>
                                <br>
                              </form>
                            <table id="examplea" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Pelanggan</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                        $no=1;
                                        foreach ($detailmasuk as $dm) {
                                      ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $dm->tanggal_transakasi_masuk ?></td>
                                        <td><?= $dm->nama_pelanggan ?></td>
                                        <td><?= $dm->nama_sasirangan ?></td>
                                        <td><?= $dm->jumlah ?></td>
                                        <td><?= 'Rp ' . number_format($dm->harga_produk, 2, ',', '.'); ?></td>
                                        <td><?= 'Rp ' . number_format($dm->total_harga, 2, ',', '.'); ?></td>
                                        
                                        <?php 
                                          $status = $dm->status;
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
                                        <td><span class="badge <?= $badgeClass; ?>"><?= $dm->status ?></span></td>
                                    </tr>
                                    <?php
                                          }
                                        ?>
                                </tbody>
                            </table>
                          </div>
                          <div class="tab-pane" id="tabs-profile-7">
                            <h4>Tab Transaksi Keluar</h4><br>
                              <table id="detailkeluar" class="display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Pelanggan</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                        $no=1;
                                        foreach ($detailkeluar as $dk) {
                                      ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $dk->tanggal_transakasi_masuk ?></td>
                                        <td><?= $dk->nama_pelanggan ?></td>
                                        <td><?= $dk->nama_sasirangan ?></td>
                                        <td><?= $dk->jumlah ?></td>
                                        <td><?= 'Rp ' . number_format($dk->harga_produk, 2, ',', '.'); ?></td>
                                        <td><?= 'Rp ' . number_format($dk->total_harga, 2, ',', '.'); ?></td>
                                        
                                        <?php 
                                          $status = $dk->status;
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
                                        <td><span class="badge <?= $badgeClass; ?>"><?= $dk->status ?></span></td>
                                    </tr>
                                    <?php
                                          }
                                        ?>
                                </tbody>
                            </table>
                          </div>
                          <div class="tab-pane" id="tabs-settings-7">
                            <h4>Settings tab</h4>
                            <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet, facilisi sit mauris accumsan nibh habitant senectus</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <script>
          function formatDate(dateString) {
            var date = new Date(dateString);
            var year = date.getFullYear();
            var month = ("0" + (date.getMonth() + 1)).slice(-2);
            var day = ("0" + date.getDate()).slice(-2);
            return year + "-" + month + "-" + day;
          }

          document.querySelector("form").addEventListener("submit", function(event) {
            var minInput = document.getElementById("min");
            var maxInput = document.getElementById("max");
            minInput.value = formatDate(minInput.value);
            maxInput.value = formatDate(maxInput.value);
          });
        </script>