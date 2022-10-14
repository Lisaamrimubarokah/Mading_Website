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
                        <li class=" breadcrumb-item"><a href="<?= base_url('jadwal/index') ?>">Jadwal</a></li>
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
                        <?php echo form_open_multipart('jadwal/update/' . $jadwal['id_jadwal']); ?>
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mata Kuliah</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-book-open"></i></span>
                                                    </div>
                                                    <input value="<?= $jadwal['matkul']; ?>" name="matkul" placeholder="Mata Kuliah" id="matkul" type="text" class="form-control">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ruang Kelas</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-school"></i></span>
                                                    </div>
                                                    <input value="<?= $jadwal['ruang_kelas']; ?>" name="ruang_kelas" placeholder="Input Ruang Kelas" id="ruang_kelas" type="text" class="form-control">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Dosen</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
                                                    </div>
                                                    <input value="<?= $jadwal['dosen']; ?>" name="dosen" placeholder="Dosen Mata Kuliah" id="dosen" type="text" class="form-control">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input value="<?= $jadwal['tanggal']; ?>" name="tanggal" placeholder="Input Tanggal" id="tanggal" type="date" class="form-control">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Jam Mulai</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-hourglass-start"></i></span>
                                                    </div>
                                                    <input value="<?= $jadwal['jam_mulai']; ?>" name="jam_mulai" placeholder="Input Jam Mulai" id="jam_mulai" type="time" class="form-control">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Jam Selesai</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-hourglass-end"></i></span>
                                                    </div>
                                                    <input value="<?= $jadwal['jam_selesai']; ?>" name="jam_selesai" placeholder="Input Jam Selesai" id="jam_selesai" type="time" class="form-control">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="id_status" id="id_status" class="form-control select2">
                                                    <option value="">--Pilih Status--</option>
                                                    <?php foreach ($status as $c) : ?>
                                                        <?php if ($c['id_status'] == $jadwal['id_status']) { ?>
                                                            <option value="<?= $c['id_status'] ?>" selected><?= $c['nama_status'] ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?= $c['id_status'] ?>"><?= $c['nama_status'] ?></option>
                                                    <?php
                                                        }
                                                    endforeach; ?>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <!-- <button type="reset" class="btn btn-sm btn-default float-right">Reset</button> -->
                            <button type="submit" class="btn btn-sm btn-info float-right">Edit</button>
                            <a href="<?= base_url('jadwal/index') ?>" class="btn btn-sm btn-danger float-right">Back</a>
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

