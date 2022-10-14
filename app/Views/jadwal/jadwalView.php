<?= $this->extend('topnav/gabungan'); ?>


<?= $this->section('content') ?>

<div class="content-wrapper" style="background-image:linear-gradient(to right, #838FD1, #AAB6FB, #F6A7B3);">
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
						<li class="breadcrumb-item active"><?= $title; ?></li>
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
                <div class="col-2"></div>
				<div class="col-8">
					<div class="card card-lightblue shadow">
						<div class="card-header">
							<h3 class="card-title"><?= $title; ?></h3>
							<!-- <div class="card-tools">
								<a href="<?= base_url('jadwal/form') ?>" class="btn btn-tool">
									<i class="fa fa-plus"> Add</i>
								</a>
							</div> -->
							<!-- /.card-tools -->
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<?php
							if (session()->getFlashdata('pesan')) {
								echo '<div class = "alert alert-success" role="alert">';
								echo session()->getFlashdata('pesan');
								echo '</div>';
							}
							?>
							<table id="example1" class="table table-bordered table-striped text-center">
								<thead>
									<tr>
										<th>No</th>
										<th>Mata Kuliah</th>
										<th>Tanggal</th>
										<th>Jam Mulai</th>
										<th>Jam Selesai</th>
										<th>Ruang kelas</th>
										<th>Dosen</th>
										<th>Status</th>
							
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($jadwal as $key => $value) { ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $value['matkul'] ?></td>
											<td><?= $value['tanggal'] ?></td>
											<td><?= $value['jam_mulai'] ?></td>
											<td><?= $value['jam_selesai'] ?></td>
											<td><?= $value['ruang_kelas'] ?></td>
											<td><?= $value['dosen'] ?></td>
											<td>
												<?php if ($value['id_status'] == '1') {
													echo '<span class=" badge bg-success">On Going</span>';
												} else if ($value['id_status'] == '2') {
													echo '<span class=" badge bg-danger">Canceled</span>';
												} else if ($value['id_status'] == '3') {
													echo '<span class=" badge bg-primary">Done</span>';
												}

												?>

											</td>

											
										</tr>
									<?php $no++; ?>

									<?php } ?>

								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Mata Kuliah</th>
										<th>Tanggal</th>
										<th>Jam Mulai</th>
										<th>Jam Selesai</th>
										<th>Ruang kelas</th>
										<th>Dosen</th>
										<th>Status</th>
						
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
                <div class="col-2"></div>
			</div>
		</div>
	</section>

</div>



<?= $this->endSection() ?>