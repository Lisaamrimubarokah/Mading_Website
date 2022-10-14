<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('front/index') ?>" class="brand-link">
        <img src="<?= base_url() ?>/icon/golagi.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text " style="font-family:'Readex Pro', sans-serif; font-weight:700;">GOMading</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php if (session()->get('foto') == null) { ?>

                    <img src="<?= base_url() ?>/icon/user.jpg" class="img-circle elevation-2" style="width: 35px; height:35px;" alt="User Avatar">

                <?php } else { ?>
                    <img src="<?= base_url('meduser/' . session()->get('foto')) ?>" class="img-circle elevation-2" alt="User Image" style="width: 35px; height:35px;">
                <?php } ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session()->get('username') ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php
                $db      = \Config\Database::connect();
                $hakAksesbyRole = $db->table('tbl_hak_akses')
                    ->where('id_role', session()->get('id_role'))
                    ->get()->getResultArray(); ?>


                <li class="nav-item">
                    <a href="<?= base_url('dashboard/index') ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
                <!-- <li class="nav-item">
                    <a href="<?= base_url('auth/index') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Login
                        </p>
                    </a>

                </li> -->
                <li class="nav-item">
                    <a href="<?= base_url('front/index') ?>" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <?php foreach ($hakAksesbyRole as $h) {
                    if ($h['id_menu'] == 2) { ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-group"></i>
                                <p>
                                    User
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('user/index') ?>" class=" nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('hakAkses/index') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Akses User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                <?php };
                } ?>

                <?php foreach ($hakAksesbyRole as $h) {
                    if ($h['id_menu'] == 4) { ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-bullhorn"></i>
                                <p>
                                    Pengumuman
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('pengumuman/full') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Pengumuman</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('pengumuman/index') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Pengumuman</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                <?php };
                } ?>

                <?php foreach ($hakAksesbyRole as $h) {
                    if ($h['id_menu'] == 3) { ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-shekel-sign"></i>
                                <p>
                                    Berita
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('berita/full') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Berita</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('berita/index') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Berita</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                <?php };
                } ?>

                <?php foreach ($hakAksesbyRole as $h) {
                    if ($h['id_menu'] == 1) { ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Jadwal Perkuliahan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('jadwal/view') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Jadwal</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('jadwal/index') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Jadwal</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                <?php };
                } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>