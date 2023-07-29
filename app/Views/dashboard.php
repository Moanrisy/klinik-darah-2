<!-- Extend from layout index -->
<?= $this->extend('agungsugiarto\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>
<div class="row">
    <!-- Daftar layanan -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Daftar layanan</h5>
            </div>
            <div class="card-body">
                <form id="servicesForm">
                    <h6 class="card-title">Pilih layanan:</h6>
                    <br>

                    <?php foreach ($services as $service) { ?>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="<?= 'service' . esc($service['name']) ?>" name="services[]" value="<?= esc($service['name']) ?>">
                            <label class="form-check-label" for="<?= 'service' . esc($service['name']) ?>"><?= esc($service['name']) ?></label>
                        </div>
                    <?php } ?>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>


        <!-- <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Featured</h5>
            </div>
            <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div> -->
    </div>
    <!-- Nomor antrian -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nomor antrian 1234</h5>

                <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's
                    content.
                </p>

                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5 class="card-title">Nomor antrian 1233</h5>

                <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's
                    content.
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div><!-- /.card -->
    </div>

    <!-- /.col-md-6 -->
</div>
<?= $this->endSection() ?>