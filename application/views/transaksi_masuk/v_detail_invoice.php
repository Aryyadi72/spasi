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
                        <?php $no=1; foreach($transaksi as $t) : ?>
            <form action="<?= base_url('transaksi_masuk/proses_transaksi_banyak/'. $t['id_invoice']); ?>" method="POST">
                    <?php endforeach; ?>
            <table id="tm" class="display" style="width:100%;">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAll"></th>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            $no=1; 
                            foreach($transaksi as $t) :
                        ?>
                        <td>
                            
                                <input type="checkbox" name="selected_items[]" value="<?= $t['id_transaksi_masuk']; ?>">
                            
                        </td>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $t['nama_sasirangan'] ?></td>
                        <td><?= $t['jumlah'] ?></td>
                        <td><?= 'Rp ' . number_format($t['harga_produk'], 2, ',', '.'); ?></td>
                        <td><?= 'Rp ' . number_format($t['total_harga'], 2, ',', '.'); ?></td>
                        
                        <?php 
                            $status = $t['status'];
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
                                    case 'Diterima':
                                        $badgeClass = 'bg-secondary';
                                        break;
                                    default:
                                        $badgeClass = 'bg-blue';
                                        break;
                            }
                        ?>

                        <td style="margin-bottom:5px;margin-top:10px;padding:5px;" class="badge <?= $badgeClass; ?>"><?= $status ?></td>
                        <td class="align-items-center">
                            <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                                <a href="<?= base_url('transaksi_masuk/proses_transaksi_batal/'.$t['id_transaksi_masuk']) ?>" class="btn btn-ghost-danger w-100 btn-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7l16 0"></path>
                                        <path d="M10 11l0 6"></path>
                                        <path d="M14 11l0 6"></path>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php
                        endforeach;
                    ?>
                </tbody>
            </table>
            <hr>
                <div class="mb-3 row">
                    <label class="col-3">Keterangan</label>
                    <div class="col">
                        <textarea class="form-control" name="keterangan" cols="30" rows="10"></textarea>
                    </div>
                </div>

                <div class="mb-3 row" hidden>
                    <label class="col-3">Status</label>
                    <div class="col">
                        <input type="text" class="form-control" name="status" value="Proses">
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