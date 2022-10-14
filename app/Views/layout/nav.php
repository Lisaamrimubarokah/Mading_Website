<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">

            <a href="<?= base_url('front/index') ?>" class="nav-link"><i class="nav-icon fas fa-home"></i> Home</a>

        </li>

    </ul>

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

                <!-- Message Start -->
                <div>
                    <h5 class="dropdown-header text-center">Hello, <?= session()->get('username') ?></h5>

                </div>
                <!-- Message End -->

                <div class="dropdown-divider"></div>
                <a href="<?= base_url('user/profile') ?>" class="dropdown-item dropdown-footer">Profil</a>
                <a href="<?= base_url('auth/logout') ?>" class="dropdown-item dropdown-footer">Logout</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->