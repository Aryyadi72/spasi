<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Keranjang
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <!-- <button type="submit" class="btn btn-green">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
                        Checkout
                    </button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
            <div class="container-xl">
                <div class="card card-lg">
                    <div class="card-body">
            <form action="<?= base_url('keranjang/checkout_banyak') ?>" method="POST">
            <table id="keranjang" class="display" style="width:100%;">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAll"></th>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            $no=1; 
                            foreach($keranjang as $k) :
                        ?>
                        <td><input type="checkbox" name="selected_items[]" value="<?= $k['id_keranjang']; ?>"></td>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $k['nama_sasirangan'] ?></td>
                        <td><?= $k['jumlah'] ?></td>
                        <td><?= 'Rp ' . number_format($k['total_harga'], 2, ',', '.'); ?></td>
                    </tr>
                    <?php
                        endforeach;
                    ?>
                </tbody>
            </table>
            <hr>
            <div class="mb-3 row">
                <label class="col-3 col-form-label">Metode Pembayaran</label>
                    <div class="col">
                        <select class="form-select" name="metode_pembayaran">
                            <option selected disabled>Pilih Metode Pembayaran</option>
                            <option value="Cash">Cash</option>
                            <option value="Transfer">Transfer</option>
                        </select>
                    </div>
            </div>

            <div class="mb-3 row">
                <label class="col-3 col-form-label">Metode Pengiriman</label>
                    <div class="col">
                        <select class="form-select" name="metode_pengiriman">
                            <option selected disabled>Pilih Metode Pengiriman</option>
                            <option value="Ambil di Tempat">Ambil di Tempat</option>
                            <option value="Kirim ke Alamat Tujuan">Kirim ke Alamat Tujuan</option>
                        </select>
                    </div>
            </div>
            <button type="submit" class="btn btn-green">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
                Checkout
            </button>
            </form>
        <hr>
    </div>
</div>
</div>
</div>
</div>

<script>
    var checkAll = document.getElementById('checkAll');
    var checkboxes = document.getElementsByName('selected_items[]');

    checkAll.addEventListener('click', function() {
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = checkAll.checked;
        });
    });
</script>