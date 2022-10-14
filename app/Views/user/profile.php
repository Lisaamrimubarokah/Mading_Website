<?= $this->extend('topnav/gabungan'); ?>


<?= $this->section('content') ?>



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
            <li class="breadcrumb-item active">Profil User</li>
          </ol>
        </div>
      </div>
      <section class="section">


        <div class="card bg-light mb-3" style="max-width:fit-content;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="<?= base_url('meduser/' . session()->get('foto')) ?>" class="card-img">

            </div>
            <?php
            $db     = \Config\Database::connect();
            $profile = $db->table('tbl_user')
              ->select("tbl_user.id_user, tbl_user.id_role, tbl_user.username, tbl_user.email, tbl_user.password, tbl_user.status, tbl_user.created_at AS 'created_at_user',  tbl_user.foto")
              ->join('tbl_role', 'tbl_role.id_role = tbl_user.id_role', 'left')
              ->where('id_user', session()->get('id_user'))
              ->get()->getRowArray(); ?>

            <div class="col-md-8">
              <div class="card-body">
                <p class="card-title">
                <h1><?= session()->get('username')?> <small>(<?= session()->get('id_user')?>)</small></h1>
                </p>
                <p class="card-text"><?= session()->get('email') ?></p>
                <!-- <p class="card-text"><?= session()->get('status') ?></p> -->
                <p class="text-muted"><small> Merupakan user dengan posisi <b><?php if (session()->get('id_role') == 1) {
                                                                                echo 'Super Admin';
                                                                              } elseif (session()->get('id_role') == 2) {
                                                                                echo 'Admin Konten';
                                                                              } elseif (session()->get('id_role') == 3) {
                                                                                echo 'Admin Dosen';
                                                                              } ?></b></small></p>
                <p class="text-muted"><small> User sejak <?= $profile["created_at_user"] ?></small></p>
              </div>
            </div>
          </div>
        </div>

      </section>
    </div>
  </div>
</div>

<?= $this->endSection() ?>