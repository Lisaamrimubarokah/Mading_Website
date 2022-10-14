<?php include 'header.php' ?>
        <!-- Pengumuman -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://cs.upi.edu/v2/assets/images/slides/banner_asiin_en.png" alt="First slide">
                    <div class="carousel-caption d-none d-xl-block">
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="https://cs.upi.edu/v2/assets/images/slides/banner_Pak_Budi.png" alt="Second slide">
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="https://cs.upi.edu/v2/assets/images/slides/UPI_Anniversarry.jpg" alt="Third slide">
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="https://cs.upi.edu/v2/assets/images/slides/banner-akreditasi[en]_(1)_(1).png" alt="Fourth slide">
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="https://cs.upi.edu/v2/assets/images/slides/Computer_Science_UPI_-_3[EN].png" alt="Fifth slide">
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <div class="nav-icon">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </div>
            </a>

            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <div class="nav-icon">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </div>
            </a>
        </div>


        <!-- Berita -->
        <h3>Terkini</h3>

        <div class="row">
            <?php foreach ($pengumuman as $key => $value) {  ?>
                <div class="col-md-4 col-sm-12 mb-3">
                    <div class="card flex-fill">
                        <img src="<?= base_url('med_pengumuman/' . $value['medpengumuman']); ?>" class="card-img-top" alt="...">

                        <div class="card-body">
                            <div class="card-title">
                                <h4><?= character_limiter($value['judul'], 50)  ?></h4>
                            </div>  
                            <?= character_limiter($value['deskripsi'], 100)  ?>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('pengumuman/baca/' . $value['id_pengumuman']) ?>" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- <div class="col-md-4 col-sm-6 mb-3">
                <div class="card">
                    <img src="https://cs.upi.edu/v2/assets/images/news/thumbs/SLE_webinar_thumb.png" class="card-img-top" alt="...">

                    <div class="card-body">
                        <div class="card-title">
                            <h4>Webinar Trend and Future Research Of Smart Learning Environment (Research Opportunities for Bachelor, Master, and Doctoral Levels)</h4>
                        </div>
                        On March 19, 2022, the Smart Learning Environment Study Group (KBK SLE) Computer Science Education Department held a webinar themed Trend and Future Research Of Smart Learning Environment
                    </div>

                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card">
                    <img src="https://cs.upi.edu/v2/assets/images/news/thumbs/parampa2022_thumb.png" class="card-img-top" alt="...">

                    <div class="card-body">
                        <div class="card-title">
                            <h4>Students of the Computer Science Education Department successfully defended the title of PARAMPA General Champion</h4>
                        </div>
                        The Family of Computer Students once again won the general champion at the 2022 FPMIPA Sports Parade (PARAMPA) event which was held from January 29, 2022 to March 6, 2022. This year PARAMPA was held online and offline
                    </div>

                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div> -->
        </div>
<?php include 'footer.php' ?>