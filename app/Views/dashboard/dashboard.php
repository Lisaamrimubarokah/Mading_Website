<?= $this->extend('layout/gabungan'); ?>

<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:'Readex Pro', sans-serif; font-weight:700;"><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard/index') ?>">Dashboard</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#"><?= $page; ?></a></li> -->

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
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-blue shadow">
                        <div class="inner">
                            <h3><?= $jmlpengumuman; ?></h3>
                            <p>Pengumuman</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a> -->
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success shadow">
                        <div class="inner">
                            <h3><?= $jmlberita; ?></h3>
                            <p>Berita</p>
                        </div>
                        <div class="icon">
                            <i class="fab fa-neos"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a> -->
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning shadow">
                        <div class="inner">
                            <h3><?= $jmluser; ?></h3>
                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a> -->
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-indigo shadow">
                        <div class="inner">
                            <h3><?= $jmljadwal; ?></h3>
                            <p>Jadwal</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-calendar"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a> -->
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-maroon">
                                    <h3 class="widget-user-username"><?= session()->get('username') ?></h3>
                                    <h5 class="widget-user-desc">
                                        <?php if (session()->get('id_role') == 1) {
                                            echo 'Super Admin';
                                        } elseif (session()->get('id_role') == 2) {
                                            echo 'Admin Konten';
                                        } elseif (session()->get('id_role') == 3) {
                                            echo 'Admin Dosen';
                                        } ?>

                                    </h5>
                                </div>
                                <div class="widget-user-image">
                                    <?php if (session()->get('foto') == null) { ?>

                                        <img src="<?= base_url() ?>/icon/user.jpg" class="img-circle elevation-2" style="width: 100px; height:100px;" alt="User Avatar">

                                    <?php } else { ?>
                                        <img class="img-circle elevation-2" src="<?= base_url('meduser/' . session()->get('foto')) ?>" style="width: 100px; height:100px;" alt="User Avatar">
                                    <?php } ?>

                                </div>
                                <div class="card-footer">
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="description-block">
                                                <h5 class="description-header">Halo! Saya <?= session()->get('username') ?></h5>
                                                <span">Sebagai <?php if (session()->get('id_role') == 1) {
                                                                    echo 'Super Admin';
                                                                } elseif (session()->get('id_role') == 2) {
                                                                    echo 'Admin Konten';
                                                                } elseif (session()->get('id_role') == 3) {
                                                                    echo 'Admin Dosen';
                                                                } ?>

                                                    <!-- Anda dapat mengatur data <?php if (session()->get('id_role') == 1) {
                                                                                    echo 'User, Berita, Jadwal, serta Pengumuman';
                                                                                } elseif (session()->get('id_role') == 2) {
                                                                                    echo 'Pengumuman, Berita, dan Jadwal';
                                                                                } elseif (session()->get('id_role') == 3) {
                                                                                    echo 'Jadwal Perkuliahan';
                                                                                } ?></span> -->
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->

                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h3 class="card-title">User Terbaru</h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <ul class="users-list clearfix">
                                        <?php foreach ($user as $key => $value) {  ?>
                                            <li>
                                                <?php if ($value['foto'] == null) { ?>
                                                    <img src="<?= base_url() ?>/icon/user.jpg" class="user-image img-circle"  alt="User Avatar">

                                                <?php } else { ?>
                                                    <img src="<?= base_url('meduser/' . $value['foto']); ?>" alt="User Image" class="user-image img-circle">
                                                
                                                <?php } ?>
                                                
                                                
                                                <a class="users-list-name" href="#"><?= $value['username']; ?></a>
                                                <p class="users-list-date"><?= $value['role']; ?></p>
                                            </li>

                                        <?php } ?>
                                    </ul>
                                    <!-- /.users-list -->
                                </div>
                                <!-- /.card-body -->
                                <!-- <div class="card-footer text-center">
                                    <a href="<?= base_url('user/index') ?>">View All Users</a>
                                </div> -->
                                <!-- /.card-footer -->
                            </div>
                            <!--/.card -->

                        </div>

                    </div>


                </div>
                <div class="col-md-8">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Pengumuman Terbaru</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0 text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Pengumuman</th>
                                                <th>Kategori</th>
                                                <th width="500px">Judul</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($pengumuman as $key => $value) { ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $value['id_pengumuman'] ?></td>
                                                    <td><?= $value['kategori_nama'] ?></td>
                                                    <td><?= $value['judul']  ?></td>


                                                </tr>
                                                <?php $no++; ?>

                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>

                        </div>
                        <!-- /.card -->

                    </div>

                </div>

            </div>






        </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>