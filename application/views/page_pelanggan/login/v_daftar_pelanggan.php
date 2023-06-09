<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta17
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?= $title ?></title>
    <!-- CSS files -->
    <link href="<?= base_url() ?>assets/dist/css/tabler.min.css?1674944402" rel="stylesheet"/>
    <link href="<?= base_url() ?>assets/dist/css/tabler-flags.min.css?1674944402" rel="stylesheet"/>
    <link href="<?= base_url() ?>assets/dist/css/tabler-payments.min.css?1674944402" rel="stylesheet"/>
    <link href="<?= base_url() ?>assets/dist/css/tabler-vendors.min.css?1674944402" rel="stylesheet"/>
    <link href="<?= base_url() ?>assets/dist/css/demo.min.css?1674944402" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body  class=" d-flex flex-column">
    <script src="<?= base_url() ?>assets/dist/js/demo-theme.min.js?1674944402"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?= base_url() ?>assets/static/logo.svg" height="36" alt=""></a>
        </div>
        <form class="card card-md" action="<?php echo base_url('login_pelanggan/proses_tambah_pelanggan'); ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Create new account</h2>

                  <div class="mb-3">
                    <label class="col-3 col-form-label required">Nama</label>
                    <div class="col">
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama" name="nama_pelanggan">
                    </div>
                  </div>

                  <div class="mb-3">
                      <label class="col-3 col-form-label required">Alamat</label>
                      <div class="col">
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Alamat" name="alamat">
                      </div>
                  </div>

                  <div class="mb-3">
                    <label for="Nomor Telepon" class="col-4 col-form-label required">Nomor Telepon</label>
                    <div class="col">
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nomor Telepon" name="no_telp">
                    </div>
                  </div>

                  <div class="mb-3">
                    <label class="col-3 col-form-label required">Upload Foto</label>
                    <div class="col">
                      <input class="form-control" type="file" id="formFile" name="userfile">
                    </div>
                  </div>

                  <div class="mb-3">
                    <label class="col-3 col-form-label required">Username</label>
                    <div class="col">
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Username" name="username">
                    </div>
                  </div>

                  <div class="mb-3">
                    <label class="col-3 col-form-label required">Password</label>
                    <div class="col">
                    <div class="input-group input-group-flat">
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Password" name="password">
                      <span class="input-group-text">
                        <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                        </a>
                      </span>
                    </div>
                      
                    </div>
                  </div>

                  <div class="mb-3" hidden>
                    <!-- <label class="col-3 col-form-label">Level</label> -->
                    <div class="col">
                      <select class="form-select" name="id_level">
                        <!-- <option selected disabled>Pilih Level</option> -->
                        <option selected value="3">Pelanggan</option>
                      </select>
                    </div>
                  </div>

            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Create new account</button>
            </div>
          </div>
        </form>
        <div class="text-center text-muted mt-3">
          Already have account? <a href="<?= base_url('login_pelanggan')?>" tabindex="-1">Sign in</a>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url() ?>assets/dist/js/tabler.min.js?1674944402" defer></script>
    <script src="<?= base_url() ?>assets/dist/js/demo.min.js?1674944402" defer></script>
  </body>
</html>