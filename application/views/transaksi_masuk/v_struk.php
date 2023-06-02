<div class="col-md-10 col-lg-8" style="margin-left:300px;padding:10px;">
    <div class="col">
        <?php if (isset($struk)) : ?>
        <a href="#" class="card card-link">
            <div class="card-body">
                <img src="<?= base_url('assets/upload/struk/' . $struk->file_struk) ?>" alt="Struk">
            </div>
        </a>
        <?php else : ?>
            <p>Struk tidak ditemukan.</p>
        <?php endif; ?>
    </div>
</div>