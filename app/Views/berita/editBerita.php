<?= $this->extend('layout/gabungan'); ?>


<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $page; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard/index') ?>">Dashboard</a></li>
                        <li class=" breadcrumb-item"><a href="<?= base_url('berita/index') ?>">Berita</a></li>
                        <li class=" breadcrumb-item active"><?= $page; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <hr>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header bg-olive">
                            <h3 class="card-title"><?= $page; ?></h3>
                            <!-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div> -->
                        </div>
                        <!-- /.card-header -->
                        <?php echo form_open_multipart('berita/update/' . $berita['id_berita']); ?>
                        <div class="card-body">
                            <?php
                            $errors = session()->getFlashdata('errors');
                            if (!empty($errors)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        <?php foreach ($errors as $key => $value) { ?>
                                            <li><?= esc($value) ?></li>

                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                            <div class="row ">
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>ID User</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                                    </div>
                                                    <input name="id_user" placeholder="ID User" id="id_user" value="<?= session()->get('id_user') ?>" type="text" class="form-control" disabled>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->
                                            <div class="form-group">
                                                <label>Judul Berita</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                                    </div>
                                                    <input value="<?= $berita['judul_berita']; ?>" type="text" class="form-control" id="judul_berita" name="judul_berita" placeholder="Judul Berita">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select name="id_kategori" id="id_kategori" class="form-control select2">
                                                    <option value="">--Pilih--</option>
                                                    <?php foreach ($kategori as $c) : ?>
                                                        <?php if ($c['id'] == $berita['id_kategori']) { ?>
                                                            <option value="<?= $c['id'] ?>" selected><?= $c['kategori_nama'] ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?= $c['id'] ?>"><?= $c['kategori_nama'] ?></option>
                                                    <?php
                                                        }
                                                    endforeach; ?>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Media</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="med_berita" name="med_berita">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img width="300px" height="200px" id="gambar_load" class="user-image" src="<?= base_url('medberita/' . $berita['med_berita']) ?>" alt="">

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Deskripsi Berita</label>
                                        <textarea value="<?= $berita['id_berita']; ?>" class="form-control" placeholder="input deskripsi berita disini" id="desk_berita" name="desk_berita"><?= $berita['desk_berita'] ?></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <!-- <button type="reset" class="btn btn-sm btn-default float-right">Reset</button> -->
                            <button type="submit" class="btn btn-sm btn-info float-right">Edit</button>
                            <a href="<?= base_url('berita/index') ?>" class="btn btn-sm btn-danger float-right">Back</a>
                        </div>
                        <!-- /.card-footer -->
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>




<?= $this->endSection() ?>

<?= $this->section('js') ?>
<!-- bs-custom-file-input -->
<script src="<?= base_url() ?>/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#desk_berita'))
        .catch(error => {
            console.log(error);
        });
</script>


<?= $this->endSection() ?>