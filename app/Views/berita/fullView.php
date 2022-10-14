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
                        <li class="breadcrumb-item active">Berita</li>
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
                <div class="col-sm-12 col-md-8">
                    <div class="card h-100">


                        <div class="card-body">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="<?= base_url() ?>/medberita/1654502039_df76177605a284902502.png" alt="First slide">
                                        <!-- <div class=" carousel-caption d-none d-md-block">
                                            <h5>Mba Icem & Ayang</h5>
                                            <p>Semoga Bahagia Selalu</p>
                                        </div> -->

                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="<?= base_url() ?>/medberita/1654485490_b0ab4869d66935cb616d.png" alt="Second slide">
                                        <!-- <div class="carousel-caption d-none d-md-block">
                                            <h5>Sehun Ganteng</h5>
                                            <p>Semoga Jodoh</p>
                                        </div> -->
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="<?= base_url() ?>/medberita/parampa.png" alt="Third slide">
                                        <!-- <div class="carousel-caption d-none d-md-block">
                                            <h5>Macan</h5>
                                            <p>Rawr...</p>
                                        </div> -->
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-custom-icon" aria-hidden="true">
                                        <i class="fas fa-chevron-left"></i>
                                    </span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-custom-icon" aria-hidden="true">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-sm-12 col-md-4">
                    <div class="card h-100">
                        <div class="card-header bg-maroon">
                            <h3><b>Berita</b> Terbaru</h3>
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

                </div>


            </div>
            <!-- /.row -->
            <div class="row mt-5">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 style="color:orangered;"><b>Lihat </b>Lainnya</h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row match-height">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-deck">
                                <?php foreach ($berita as $key => $value) { ?>
                                    <div class="card">
                                        <div class="card-widget widget-user">
                                            <div class="widget-user-header">
                                                <img class="card-img-top" src="<?= base_url('medberita/' . $value['med_berita']); ?>" alt="Card image cap">
                                            </div>
                                        </div>
                                        <div class="card-body mt-4">
                                            <h5 class="card-title"><?= character_limiter($value['judul_berita'], 50)  ?></h5>
                                            <p class="card-text"><?= character_limiter($value['desk_berita'], 100)  ?></p>
                                            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                                        </div>
                                        <div class="card-footer d-flex justify-content-center">
                                            <a href="<?= base_url('berita/baca/' . $value['id_berita']) ?>" class="btn btn-sm btn-secondary  me-1 mb-1">Baca lebih lanjut</a>
                                        </div>
                                    </div>


                                <?php } ?>
                            </div>


                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <a href="<?= base_url('berita/all') ?>" class="btn btn-sm btn-info  me-1 mb-1">Baca lainnya...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection() ?>