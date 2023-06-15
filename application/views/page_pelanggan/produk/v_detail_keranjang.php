<br><br>
<div class="container">
<div class="page-wrapper">
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                                $no=1; 
                                foreach($items as $i) :
                            ?>
                            <tr>
                                <td class="text-muted" data-label="No" >
                                    <?= $no++ ?>
                                </td>

                                <td data-label="Nama Produk" >
                                    <div class="d-flex py-1 align-items-center">
                                        <div class="flex-fill">
                                            <div class="font-weight-medium"><?= $i['name'] ?></div>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-muted" data-label="Harga" >
                                    <?= $i['price'] ?>
                                </td>

                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="<?= base_url('transaksi_pelanggan/transaksi?id='. $i['id']) ?>" class="btn">
                                            Checkout
                                        </a>
                                    </div>
                                </td>

                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>