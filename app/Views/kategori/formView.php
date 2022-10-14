<?= $this->extend('layout/indexView'); ?>


<?= $this->section('content') ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title; ?></h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('home/index') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('kategori/index') ?>">Kategori</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $page; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3><?= $page; ?></h3>
                    </div>

                </div>
            </div>
            <div class="card-body">
                

                <?php echo form_open('kategori/insert'); ?>

                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="kategori_nama" class="mb-3">Nama Kategori</label>
                                <input type="text" id="kategori_nama" class="form-control" name="kategori_nama" placeholder="Nama Kategori">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-primary me-1 mb-1"><i class="bi bi-save"></i> Submit</button>
                            <button type="reset" class="btn btn-sm btn-light-secondary me-1 mb-1">Reset</button>
                            <a href="<?= base_url('kategori/index') ?>" class="btn btn-sm btn-danger me-1 mb-1">Back</a>
                        </div>
                    </div>

                </div>

                <?php echo form_close() ?>

            </div>
        </div>

    </section>
</div>


<?= $this->endSection() ?>