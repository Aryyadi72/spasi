
<div class="container" style="padding-top:80px;">
<div class="col-md-12">
              <form class="card" action="<?php echo base_url('transaksi_pelanggan/proses_tambah'); ?>" method="post" role="form">
                <div class="card-header">
                  <h3 class="card-title">Checkout Produk</h3>
                </div>

                <div class="card-body">

                      <input type="hidden" class="form-control" aria-describedby="emailHelp" name="id_produk" value="<?= $data ?>">

                      <input type="hidden" class="form-control" aria-describedby="emailHelp" name="id_pelanggan" value="<?= $id_pelanggan ?>">

                  <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Jumlah</label>
                    <div class="col">
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Jumlah" name="jumlah">
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-3">Keterangan</label>
                    <div class="col">
                      <textarea type="text" class="form-control" aria-describedby="emailHelp" placeholder="Keterangan" name="keterangan" cols="30" rows="10"></textarea>
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
                    <h3>Data berhasil Ditambah</h3>
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