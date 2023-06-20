<div class="page-wrapper">
        <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Invoice
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                    <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
                        Print Invoice
                    </button>
                </div>

                <div class="col-auto ms-auto d-print-none">
                    <a class="btn btn-yellow" href="<?= base_url('dashboard_pelanggan/tambah_rating?id='.$invoice['id_produk']) ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                        </svg>
                        Rate Produk
                    </a>
                </div>

            </div>
        </div>
    </div>

        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card card-lg">
                    <div class="card-body">
                <table class="table table-transparent table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 1%"></th>
                            <th>Product</th>
                            <th class="text-center" style="width: 1%">Jumlah</th>
                            <th class="text-end" style="width: 1%">Harga Satuan</th>
                            <th class="text-end" style="width: 1%">Total Perproduk</th>
                        </tr>
                    </thead>
                        <tr>
                            <td class="text-center">1</td>
                                <td>
                                    <p class="strong mb-1"><?= $invoice['nama_sasirangan'] ?></p>
                                    <div class="text-muted"><?= $invoice['deskripsi_produk'] ?></div>
                                </td>
                                
                            <td class="text-center">
                                <?= $invoice['jumlah'] ?>
                            </td>
                            <td class="text-end"><?= 'Rp ' . number_format($invoice['harga_produk'], 0, ',', '.'); ?></td>
                            <td class="text-end"><?= 'Rp ' . number_format($invoice['total_harga'], 0, ',', '.'); ?></td>
                        </tr>
                        
                        <tr>
                            <td colspan="4" class="font-weight-bold text-uppercase text-end">Total</td>
                            <td class="font-weight-bold text-end"><?= 'Rp ' . number_format($invoice['total_harga'], 0, ',', '.'); ?></td>
                        </tr>
                </table>
                    <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We look forward to working with
                    you again!</p>
                </div>
            </div>
        </div>
    </div>
</div>