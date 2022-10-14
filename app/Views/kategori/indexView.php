<?= $this->extend('layout/indexView'); ?>


<?= $this->section('content') ?>

<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3><?= $title; ?></h3>
				<p class="text-subtitle text-muted">
					Admin dapat mengelola data kategori disini
				</p>
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('home/index') ?>">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $page; ?></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<section class="section">
		<div class="card">
			<div class="card-header">
				<div class="d-flex align-items-center justify-content-between">
					<div>
						<h3>Data <?= $title; ?></h3>
					</div>
					<div class="button">
						<a href="<?= base_url('kategori/form') ?>" class="btn btn-sm btn-success"><i class="bi bi-plus"></i>Add</a>
					</div>

				</div>
			</div>
			<div class="card-body">
				<table class="table table-striped" id="table1">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Kategori</th>

							<th width="80px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($kategori as $key => $value) { ?>
							<tr>

								<td><?= $no++; ?></td>
								<td><?= $value['kategori_nama'] ?></td>

								<td>
									<div class="btn-group mb-1">
										<div class="dropdown">
											<button class="btn btn-primary dropdown-toggle me-1 btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Aksi
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="<?= base_url('kategori/edit/' . $value['id']) ?>">Edit</a>
												<a class="dropdown-item" href="<?= base_url('kategori/delete/' . $value['id']) ?>">Hapus</a>
											</div>
										</div>
									</div>
								</td>



							</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>

	</section>
</div>




<?= $this->endSection() ?>



