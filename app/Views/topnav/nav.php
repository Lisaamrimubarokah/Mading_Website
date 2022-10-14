<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="<?= base_url('front/index') ?>" class="navbar-brand">
            <img src="<?= base_url() ?>/icon/golagi.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text " style="font-weight:700; color:teal;">GOMading</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url('front/index') ?>" class="nav-link"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('berita/full') ?>" class="nav-link"><i class="fas fa-shekel-sign"></i> Berita</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pengumuman/full') ?>" class="nav-link"><i class="fas fa-bullhorn"></i> Pengumuman</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('jadwal/view') ?>" class="nav-link"><i class="far fa-calendar"></i> Jadwal</a>
                </li>
                <?php if (session()->get('id_role') == 1) { ?>
                    <li class="nav-item">
                        <a href="<?= base_url('dashboard/index') ?>" class="nav-link"><i class="fas fa-th"></i> Dashboard</a>
                    </li>
                <?php } ?>
                <?php if (session()->get('id_role') == 2) { ?>
                    <li class="nav-item">
                        <a href="<?= base_url('dashboard/index') ?>" class="nav-link"><i class="fas fa-th"></i> Dashboard</a>
                    </li>
                <?php } ?>
                <?php if (session()->get('id_role') == 3) { ?>
                    <li class="nav-item">
                        <a href="<?= base_url('dashboard/index') ?>" class="nav-link"><i class="fas fa-th"></i> Dashboard</a>
                    </li>
                <?php } ?>

                
            </ul>
        </div>
        <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="mt-2 mr-2 dropdown user user-menu">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:lightslategray;">
                <?php if (session()->get('foto') == null) { ?>
                    <i class="far fa-circle-user"></i>
                    <!-- <img src="<?= base_url() ?>/icon/user.png" class="user-image" alt="User Image"> -->

                <?php } else { ?>
                    <img src="<?= base_url('meduser/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                    
                <?php } ?>
                <span style="color:lightslategray;" class="hidden-xs"><?= session()->get('username') ?></span>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <?php if (session()->get('id_role') == null) { ?>
                <div>
                    <h5 class="dropdown-header text-center">Hello</h5>
                </div>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/index') ?>" class="dropdown-item dropdown-footer">Login</a>

                <?php } else { ?>
                    <div>
                        <h5 class="dropdown-header text-center">Hello, <?= session()->get('username') ?></h5>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('user/profile') ?>" class="dropdown-item dropdown-footer">Profil</a>
                    <a href="<?= base_url('auth/logout') ?>" class="dropdown-item dropdown-footer">Logout</a>
                <?php } ?>   
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>

    </div>
</nav>
<!-- /.navbar -->