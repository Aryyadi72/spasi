<div class="container" style="padding-top:80px;">
<div class="col-md-12">
              <form class="card" action="<?php echo base_url('pengelola/proses_edit/' . $pengelola['id_pengelola']); ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="card-header">
                  <h3 class="card-title">Ubah Pengelola</h3>
                </div>
                <div class="card-body">

                  <input type="hidden" name="id_pengelola" value="<?php echo $pengelola['id_pengelola']; ?>">

                  <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Nama</label>
                    <div class="col">
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama" name="nama" value="<?= $pengelola['nama'] ?>">
                      <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Alamat</label>
                    <div class="col">
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Alamat" name="alamat" value="<?= $pengelola['alamat'] ?>">
                      <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Nomor Telepon</label>
                    <div class="col">
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nomor Telepon" name="no_telp" value="<?= $pengelola['no_telp'] ?>">
                      <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Upload Foto</label>
                    <div class="col">
                      <input class="form-control" type="file" id="formFile" name="userfile">
                      <img src="<?= base_url()?>./assets/upload/pengelola/<?= $pengelola['foto'] ?>" name="userfile" style="width:100%;max-width:100px">
                      <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Email</label>
                    <div class="col">
                      <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" name="email" value="<?= $pengelola['email'] ?>">
                      <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Username</label>
                    <div class="col">
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Username" name="username" value="<?= $pengelola['username'] ?>">
                      <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Password</label>
                    <div class="col">
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Password" name="password" value="<?= $pengelola['password'] ?>">
                      <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-3 col-form-label">Level</label>
                    <div class="col">
                      <select class="form-select" name="id_level">
                        <option selected disabled>Pilih Level</option>
                        <option value="1" <?php if ($pengelola['id_level'] == "1") echo "selected"; ?>>Admin</option>
                        <option value="2" <?php if ($pengelola['id_level'] == "2") echo "selected"; ?>>Kasir</option>
                      </select>
                    </div>
                  </div>

                </div>
                <div class="card-footer text-end">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <!-- <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-success">Submit</a> -->
                </div>
              </form>
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
                    <h3>Data berhasil Diubah</h3>
                  </div>
                  <div class="modal-footer">
                    <div class="w-100">
                      <div class="row">
                        <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                            Dashboard
                          </a></div>
                        <div class="col"><a href="#" class="btn btn-success w-100" data-bs-dismiss="modal">
                            Tampil Data
                          </a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>