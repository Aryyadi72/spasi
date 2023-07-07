<div class="container" style="padding-top:80px;">
    <div class="col-md-12">
        <form class="card" action="<?php echo base_url('dashboard_pelanggan/proses_tambah_ulasan'); ?>" method="post" role="form">
            <div class="card-header">
                <h3 class="card-title">Rate Produk</h3>
            </div>

            <div class="card-body">

                <input type="hidden" class="form-control" aria-describedby="emailHelp" name="id_produk" value="<?= $id_produk ?>">

                <input type="hidden" class="form-control" aria-describedby="emailHelp" name="id_pelanggan" value="<?= $id_pelanggan ?>">

                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Rating</label>
                    <div class="col">
                        <input class="form-range mb-2" type="range" min="1" max="5" step="1" name="rating" id="rating">
                        <p class="text-muted small lh-base">Keterangan : <span id="rating-label">1</span></p>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Deskripsi</label>
                    <div class="col">
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Deskripsi" name="deskripsi">
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

<script>
    var ratingInput = document.getElementById('rating');
    var ratingLabel = document.getElementById('rating-label');

    ratingInput.addEventListener('input', function() {
    ratingLabel.textContent = this.value;
    });
</script>