<div class="container" style="margin-top:70px;">
    <div class="row g-2 align-items-center" style="margin-left:1200px;margin-bottom:-45px;">
        <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
            <a href="<?= base_url('sasirangan/addSasirangan') ?>" class="btn btn-indigo w-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M8 20l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4h4z"></path>
                <path d="M13.5 6.5l4 4"></path>
                <path d="M16 18h4m-2 -2v4"></path>
            </svg>
            Tambah
            </a>
        </div>
    </div>
    <h2 style="margin-bottom:-10px;">Data Sasirangan</h2>
    <hr>
        <table id="example" class="display" style="width:100%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                        $no=1; 
                        foreach($sasirangan as $s) {
                    ?>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $s->nama_sasirangan ?></td>
                    <td><?= $s->jenis_sasirangan ?></td>
                    <td><img src='<?= base_url() ?>./assets/upload/<?= $s->foto_sasirangan ?>' style="width:100%;max-width:100px"></td>
                    <td class="align-items-center">
                        <div class="row g-2 align-items-center">
                            <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                                <a href="<?= base_url('sasirangan/updateSasirangan/'. $s->id_sasirangan); ?>" class="btn btn-yellow w-100 btn-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <path d="M13.5 6.5l4 4"></path>
                                    </svg>
                                </a>
                            </div>
                            
                            <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                                <a href="<?= base_url('sasirangan/deleteSasirangan/'. $s->id_sasirangan); ?>" class="btn btn-red w-100 btn-icon">
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
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    <hr>
</div>