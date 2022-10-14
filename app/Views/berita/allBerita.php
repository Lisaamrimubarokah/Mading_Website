<?= $this->extend('topnav/gabungan'); ?>


<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0"><?= $title; ?></h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?= $page; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row match-height">
                <div class="col-sm-12 col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table">
                                <thead>
                                    <tr>
                                        <th hidden></th>
                                        <th hidden></th>
                                        <th hidden></th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($berita as $key => $value) { ?>
                                        <tr>

                                            <td><img width="150px" height="100px" src="<?= base_url('medberita/' . $value['med_berita']); ?>"></td>
                                            <td><b><?= $value['kategori_nama'] ?></b></td>
                                            <td>
                                                <a style="color: black;" href="<?= base_url('berita/baca/' . $value['id_berita']) ?>"><?= $value['judul_berita'] ?></a>
                                            </td>




                                        </tr>
                                        <?php $no++; ?>

                                    <?php } ?>

                                </tbody>
                                <!-- <tfoot>
									<tr>
										<th>No</th>
										<th>ID Berita</th>
										<th>ID User</th>
										<th>Kategori</th>
										<th>Judul Berita</th>
										<th>Deskripsi</th>
										<th>Media</th>
										<th width="80px">Aksi</th>
									</tr>
								</tfoot> -->
                            </table>



                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-sm-12 col-md-3">
                    <div class="card">
                        <div class="card-header bg-maroon">
                            <h5><b>Berita</b> Terbaru</h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <?php foreach ($recent as $key => $value) { ?>
                                <div class="row match-height text-align-justify">
                                    <div class="col-md-3">
                                        <img style="height:40px; width:50px;" class="" src="<?= base_url('medberita/' . $value['med_berita']); ?>">

                                    </div>
                                    <div class="col-md-9">
                                        <a style="color: black;" href="<?= base_url('berita/baca/' . $value['id_berita']) ?>">
                                            <h6><?= character_limiter($value['judul_berita'], 50)  ?></h6>
                                        </a>
                                    </div>
                                </div>
                                <hr>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header bg-navy">
                            <h5><b>Pengumuman</b> Terbaru</h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <?php foreach ($list as $key => $value) { ?>
                                <div class="row match-height text-align-justify">
                                    <div class="col-md-3">
                                        <img style="height:40px; width:50px;" class="" src="<?= base_url('med_pengumuman/' . $value['medpengumuman']); ?>">

                                    </div>
                                    <div class="col-md-9">
                                        <a style="color: black;" href="<?= base_url('pengumuman/baca/' . $value['id_pengumuman']) ?>">
                                            <h6><?= character_limiter($value['judul'], 50)  ?></h6>
                                        </a>
                                    </div>
                                </div>
                                <hr>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-12 col-md-4">
                    
                </div> -->
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection() ?>