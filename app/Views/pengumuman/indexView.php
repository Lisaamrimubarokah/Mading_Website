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
								<a href="<?= base_url('pengumuman/form') ?>" class="btn btn-tool">
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
										<th>ID Pengumuman</th>
										<th>ID User</th>
										<th>Kategori</th>
										<th width="200px">Judul</th>
										<th>Deskripsi</th>
										<th>Media</th>
										<th class="text-center"width="80px">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($pengumuman as $key => $value) { ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $value['id_pengumuman'] ?></td>
											<td><?= $value['id_user'] ?></td>
											<td><?= $value['kategori_nama'] ?></td>
											<td><?= character_limiter($value['judul'], 50)  ?></td>
											<td><?= character_limiter($value['deskripsi'], 100)  ?></td>
											<td><img width="100px" height="50px" src="<?= base_url('med_pengumuman/' . $value['medpengumuman']); ?>"></td>

											<td>
												<a href="<?= base_url('pengumuman/edit/' . $value['id_pengumuman']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-pen"></i></a>
												<button class="btn btn-warning btn-sm" data-target="#delete<?= $value['id_pengumuman']; ?>" data-toggle="modal"><i class="fa fa-trash"></i></button>
											</td>
										</tr>
										<?php $no++; ?>

									<?php } ?>

								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>ID Pengumuman</th>
										<th>ID User</th>
										<th>Kategori</th>
										<th width="200px">Judul</th>
										<th>Deskripsi</th>
										<th>Media</th>
										<th class="text-center">Aksi</th>
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
<?php foreach ($pengumuman as $key => $value) { ?>

	<div class="modal fade" id="delete<?= $value['id_pengumuman']; ?>">

		<div class="modal-dialog">
			<div class="modal-content bg-light">

				<div class="modal-header bg-warning">
					<h4 class="modal-title">Hapus Data <?= $title; ?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					Apakah Anda yakin menghapus <b><?= $value['judul'] ?> </b> dengan ID <b><?= $value['id_pengumuman'] ?></b> ?


				</div>


				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					<a href="<?= base_url('pengumuman/delete/' . $value['id_pengumuman']) ?>" class="btn btn-danger">Delete</a>
				</div>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<?php } ?>






<?= $this->endSection() ?>