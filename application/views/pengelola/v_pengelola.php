<div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Data Pengelola
                </h2>
              </div>
              <?php if ($id_level == 1): ?>
              <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                <a href="<?= base_url('pengelola/addPengelola')?>" class="btn btn-indigo w-100">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M8 20l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4h4z"></path>
                    <path d="M13.5 6.5l4 4"></path>
                    <path d="M16 18h4m-2 -2v4"></path>
                  </svg>
                    Tambah
                </a>
              </div>
              <?php endif; ?>
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
                        <th><button class="table-sort" data-sort="sort-city">Alamat</button></th>
                        <th><button class="table-sort" data-sort="sort-type">Nomor Telepon</button></th>
                        <th><button class="table-sort" data-sort="sort-score">Foto</button></th>
                        <th><button class="table-sort" data-sort="sort-score">Email</button></th>
                        <th><button class="table-sort" data-sort="sort-level">Level</button></th>
                        <?php if ($id_level == 1): ?>
                        <th><button class="table-sort">Aksi</button></th>
                        <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <tr>
                        <?php 
                          $no=1; 
                          foreach($pengelola as $p) {
                        ?>
                        <td class="sort-no"><?= $no++ ?></td>
                        <td class="sort-name"><?= $p->nama ?></td>
                        <td class="sort-city"><?= $p->alamat ?></td>
                        <td class="sort-type"><?= $p->no_telp ?></td>
                        <td><img src='<?= base_url() ?>./assets/upload/pengelola/<?= $p->foto ?>' style="width:100%;max-width:100px"></td>
                        <td class="sort-score"><?= $p->email ?></td>
                        <td class="sort-level"><?= $p->id_level ?></td>
                        <?php if ($id_level == 1): ?>
                        <td>
                          <div class="row g-2 align-items-center">
                          <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                            <a href="<?= base_url('pengelola/updatePengelola/'. $p->id_pengelola) ?>" class="btn btn-yellow w-100 btn-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                <path d="M13.5 6.5l4 4"></path>
                              </svg>
                            </a>
                          </div>
                          <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                            <a href="<?= base_url('pengelola/deletePengelola/'. $p->id_pengelola); ?>" class="btn btn-red w-100 btn-icon">
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
                        <?php endif; ?>
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
    <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <div class="modal-status bg-danger"></div>
                  <div class="modal-body text-center py-4">
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                    <h3>Hapus Data?</h3>
                    <div class="text-muted">Anda yakin ingin menghapus data ini?</div>
                  </div>
                  <div class="modal-footer">
                    <div class="w-100">
                      <div class="row">
                        <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                            Kembali
                          </a></div>
                        <div class="col"><a href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                            Hapus
                          </a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>