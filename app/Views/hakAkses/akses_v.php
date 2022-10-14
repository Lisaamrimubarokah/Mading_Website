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
							<!-- <div class="card-tools">
								<a href="<?= base_url('berita/form') ?>" class="btn btn-tool">
									<i class="fa fa-plus"> Add</i>
								</a>
							</div>/.card-tools -->
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
										<th width="50px">No</th>
										<th width="100px">Peran</th>
										<th >Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($role as $key => $value) { ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $value['role'] ?></td>
											<td>
												<?php
												$db      = \Config\Database::connect();
												$hakAksesbyRole = $db->table('tbl_hak_akses')
													->where('id_role', $value['id_role'])
													->get()->getRowArray(); ?>
												<a <?php if ($hakAksesbyRole == null) { ?> href="<?= base_url('hakAkses/form/' . $value['id_role']) ?>" <?php } ?> class="btn btn-danger btn-sm"><i class="fa fa-pen"></i> Input</a>
												<a <?php if ($hakAksesbyRole != null) { ?> href="<?= base_url('hakAkses/aksesEdit/' . $value['id_role']) ?>" <?php } ?> class="btn btn-warning btn-sm"><i class="fa fa-pen"></i> Edit</a>
											</td>
										</tr>
										<?php $no++; ?>

									<?php } ?>

								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Peran</th>
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






<?= $this->endSection() ?>