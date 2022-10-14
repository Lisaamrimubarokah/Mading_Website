<?= $this->extend('layout/gabungan'); ?>


<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard/index') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?= $page; ?></li>
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
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="card card-lightblue">
                        <div class="card-header">
                            <h3 class="card-title">Data <?= $title; ?></h3>
                            <!-- <div class="card-tools">
								<a href="<?= base_url('berita/form') ?>" class="btn btn-tool">
									<i class="fa fa-plus"> Add</i>
								</a>
							</div>/.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <?php echo form_open_multipart('hakAkses/insert/' . $id_role, array('name' => 'formEdit')); ?>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-sm text-center">
                                <thead>
                                    <tr>
                                        <th>Nama Menu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($menu != null) {
                                        foreach ($menu as $key => $v) { ?>
                                            <tr>
                                                <td><?= $v['nama_menu'] ?></td>
                                                <td>
                                                    <li class="d-inline-block me-2 mb-1">
                                                        <div class="form-check">
                                                            <div class="custom-control custom-checkbox">
                                                                <?php $id = $v['id_menu']; ?>
                                                                <input type="checkbox" class="form-check-input form-check-success" 
                                                                name="akses[]" id="customColorCheck3" 
                                                                value="<?= $v['id_menu'] ?>">
                                                            </div>
                                                        </div>
                                                    </li>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-info float-right">Save</button>
                            <a href="<?= base_url('hakAkses/index/') ?>" class="btn btn-sm btn-danger float-right">Back</a>
                        </div>
                        <!-- /.card-footer -->
                        <?php echo form_close() ?>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </section>
</div>






<?= $this->endSection() ?>