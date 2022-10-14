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
                        <li class=" breadcrumb-item"><a href="href=" <?= base_url('user/index') ?>">User</a></li>
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
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header bg-maroon">
                            <h3 class="card-title"><?= $page; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <?php echo form_open_multipart('user/update/' . $user['id_user']); ?>
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
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>ID User</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                                    </div>
                                                    <input name="id_user" placeholder="ID User" id="id_user" value="<?= $user['id_user'] ?>" type="text" class="form-control" disabled>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>ID Role</label>
                                                <select name="id_role" id="id_role" class="form-control select2">
                                                    <option value="">--Pilih ID Role--</option>
                                                    <?php foreach ($role as $c) : ?>
                                                        <?php if ($c['id_role'] == $user['id_role']) { ?>
                                                            <option value="<?= $c['id_role'] ?>" selected><?= $c['role'] ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?= $c['id_role'] ?>"><?= $c['role'] ?></option>
                                                    <?php
                                                        }
                                                    endforeach; ?>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                    </div>
                                                    <input value="<?= $user['username'] ?>" name="username" placeholder="Input Username" id="username" type="text" class="form-control">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                    </div>
                                                    <input value="<?= $user['email'] ?>" name="email" placeholder="Email User" id="email" type="text" class="form-control">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                    </div>
                                                    <input value="<?= $user['password'] ?>" name="password" placeholder="Input Password" id="password" type="password" class="form-control">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" id="status" class="form-control select2">
                                                    <option value="">--Pilih Status--</option>
                                                    <option value="aktif" <?php if ($user["status"] == "aktif") echo 'selected'; ?>>Aktif</option>
                                                    <option value="tidak aktif" <?php if ($user["status"] == "tidak aktif") echo 'selected'; ?>>Tidak Aktif</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Foto</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input value="<?= $user['foto']; ?>" type="file" class="custom-file-input" id="foto" name="foto">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img width="300px" height="200px" id="gambar_load" src="<?= base_url('meduser/' . $user['foto']) ?>" alt="">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <!-- <button type="reset" class="btn btn-sm btn-default float-right">Reset</button> -->
                            <button type="submit" class="btn btn-sm btn-info float-right">Edit</button>
                            <a href="<?= base_url('user/index') ?>" class="btn btn-sm btn-danger float-right">Back</a>
                        </div>
                        <!-- /.card-footer -->
                        <?php echo form_close() ?>
                    </div>
                </div>
                <div class="col-md-2"></div>
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
        .create(document.querySelector('#deskripsi'))
        .catch(error => {
            console.log(error);
        });
</script>


<?= $this->endSection() ?>