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
				<div class="col-12">
					<div class="card card-lightblue">
						<div class="card-header">
							<h3 class="card-title">Data <?= $title; ?></h3>
							<div class="card-tools">
								<a href="<?= base_url('jadwal/form') ?>" class="btn btn-tool">
									<i class="fa fa-plus"> Add</i>
								</a>
							</div><!-- /.card-tools -->
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
										<th width="80px">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($jadwal as $key => $value) { ?>
										<tr>
											<td><?= $no?></td>
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

											<td>
												<a href="<?= base_url('jadwal/edit/' . $value['id_jadwal']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-pen"></i></a>
												<button class="btn btn-warning btn-sm" data-target="#delete<?= $value['id_jadwal']; ?>" data-toggle="modal"><i class="fa fa-trash"></i></button>
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
										<th width="80px">Aksi</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>

</div>

<!-- //modal delete data -->
<?php foreach ($jadwal as $key => $value) { ?>

	<div class="modal fade" id="delete<?= $value['id_jadwal']; ?>">

		<div class="modal-dialog">
			<div class="modal-content bg-light">

				<div class="modal-header bg-warning">
					<h4 class="modal-title">Hapus Data <?= $title; ?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					Apakah Anda yakin menghapus <b><?= $value['matkul'] ?> </b> dengan tanggal <b><?= $value['tanggal'] ?></b> ?


				</div>


				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					<a href="<?= base_url('jadwal/delete/' . $value['id_jadwal']) ?>" class="btn btn-danger">Delete</a>
				</div>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<?php } ?>






<?= $this->endSection() ?>