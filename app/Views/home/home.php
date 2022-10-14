<!doctype html>
<html lang="en">

<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?= $title; ?></title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url() ?>/templatefront/assets/css/animate.css">
	<link rel="stylesheet" href="<?= base_url() ?>/templatefront/assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>/templatefront/assets/css/media-queries.css">

	<!-- Favicon and touch icons -->
	<link rel="shortcut icon" href="<?= base_url() ?>/icon/golagi.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url() ?>/templatefront/assets/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url() ?>/templatefront/assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url() ?>/templatefront/assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?= base_url() ?>/templatefront/assets/ico/apple-touch-icon-57-precomposed.png">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">

</head>

<body style="font-family:'Readex Pro', sans-serif;">

	<!-- Top menu -->
	<nav class="navbar navbar-dark fixed-top navbar-expand-md navbar-no-bg">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url('front/index') ?>">GOMading</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">

						<a class="nav-link" href="<?= base_url('berita/full') ?>"><i class="fab fa-neos"></i> Berita</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('pengumuman/full') ?>"><i class="fas fa-bullhorn"></i> Pengumuman</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('jadwal/view') ?>"><i class="far fa-calendar"></i> Jadwal</a>
					</li>
					<?php if (session()->get('id_role') == 1) { ?>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('dashboard/index') ?>"><i class="fas fa-th"></i> Dashboard</a>
						</li>


					<?php } ?>
					<?php if (session()->get('id_role') == 2) { ?>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('dashboard/index') ?>"><i class="fas fa-th"></i> Dashboard</a>
						</li>


					<?php } ?>
					<?php if (session()->get('id_role') == 3) { ?>
						<li class="nav-item">
							<a class="nav-link " href="<?= base_url('dashboard/index') ?>"><i class="fas fa-th"></i> Dashboard</a>
						</li>


					<?php } ?>
					<!-- <li>
						<?php if (session()->get('username') == null) { ?>
							<a href="<?= base_url('pengumuman/full') ?>" class="btn btn-sm btn-secondary" style="color: white;">As Guest</a>

						<?php } ?>
					</li> -->
					<li>
						<?php if (session()->get('username') == null) { ?>

							<a href="<?= base_url('auth') ?>" class="btn btn-sm btn-light mt-1 " style="color:orange;"><i class="fas fa-door-open"></i> Log In</a>
						<?php } ?>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Top content -->
	<div class="top-content">
		<div class="row no-gutters">
			<div class="col">
				<div id="carousel-example" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel-example" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example" data-slide-to="1"></li>
						<li data-target="#carousel-example" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="https://cs.upi.edu/v2/assets/images/slides/banner_asiin_en.png" class="d-block w-100" alt="img1">
							<!-- <div class="carousel-caption">
								<h1 class="wow fadeInLeftBig">Carousel Template with Bootstrap 4</h1>
								<div class="description wow fadeInUp">
									<p>
										This is a free Carousel template made with the Bootstrap 4 framework.
										Check it out now. Download it, customize and use it as you like!
									</p>

								</div>
							</div> -->
						</div>
						<div class="carousel-item">
							<img src="https://cs.upi.edu/v2/assets/images/slides/Computer_Science_UPI_-_2[EN].png" class="d-block w-100" alt="img2">
							<!-- <div class="carousel-caption">
								<h1 class="wow fadeInLeftBig">This is Slide 2 of our Carousel</h1>
								<div class="description wow fadeInUp">
									<p>
										You can download this free template on <a href="https://azmind.com" target="_blank">AZMIND</a>.
									</p>
								</div>
							</div> -->
						</div>
						<div class="carousel-item">
							<img src="https://cs.upi.edu/v2/assets/images/slides/banner-akreditasi[en]_(1)_(1).png" class="d-block w-100" alt="img3">
							<!-- <div class="carousel-caption">
								<h1 class="wow fadeInLeftBig">This is Slide 3, the Last One</h1>
								<div class="description wow fadeInUp">
									<p>
										After you download it, you can customize and use it as you like. That's great!
									</p>
								</div>
							</div> -->
						</div>
					</div>
					<a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="section-1-container section-container">
		<div class="container">
			<div class="row">
				<div class="col section-1 section-description wow fadeIn">
					<h2><b>Terkini</b></h2>
					<div class="divider-1 wow fadeInUp"><span></span></div>
				</div>
			</div>
			<div class="row">
				<?php foreach ($berita as $key => $value) {  ?>
					<div class="col-md-4 section-1-box wow fadeInUp">
						<div class="row">
							<div class="col-md-12">
								<!-- <div class="section-1-box-icon"> -->
								<img src="<?= base_url('medberita/' . $value['med_berita']); ?>" class="card-img-top" alt="...">

								<!-- </div> -->
							</div>

						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<a href="<?= base_url('berita/baca/' . $value['id_berita']) ?>"><h3><?= $value['judul_berita']  ?></h3></a>
							
							</div>

						</div>
						<div class="row">
							<div class="col-md-12">
								<p><?= character_limiter($value['desk_berita'], 100)  ?></p>

							</div>

						</div>
					</div>
				<?php } ?>
				<!-- <div class="col-md-4 section-1-box wow fadeInDown">
					<div class="row">
						<div class="col-md-4">
							<div class="section-1-box-icon">
								<i class="fas fa-cog"></i>
							</div>
						</div>
						<div class="col-md-8">
							<h3>Web design</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 section-1-box wow fadeInUp">
					<div class="row">
						<div class="col-md-4">
							<div class="section-1-box-icon">
								<i class="fab fa-twitter"></i>
							</div>
						</div>
						<div class="col-md-8">
							<h3>Social media</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>



	<!-- Footer -->
	<footer class="footer-container bg-dark">

		<div class="container">
			<div class="row">

				<div class="col">
					<small>Copyright &copy; GOMading</small></a>.
				</div>

			</div>
		</div>

	</footer>

	<!-- Javascript -->
	<script src="<?= base_url() ?>/templatefront/assets/js/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url() ?>/templatefront/assets/js/jquery-migrate-3.0.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="<?= base_url() ?>/templatefront/assets/js/jquery.backstretch.min.js"></script>
	<script src="<?= base_url() ?>/templatefront/assets/js/wow.min.js"></script>
	<script src="<?= base_url() ?>/templatefront/assets/js/waypoints.min.js"></script>
	<script src="<?= base_url() ?>/templatefront/assets/js/scripts.js"></script>

</body>

</html>