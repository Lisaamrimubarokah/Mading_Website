
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ??'Dashboard'?></title>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url() ?>/mazer/dist/assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?= base_url() ?>/mazer/dist/assets/vendors/simple-datatables/style.css">
        <link rel="stylesheet" href="<?= base_url() ?>/mazer/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?= base_url() ?>/mazer/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="<?= base_url() ?>/mazer/dist/assets/css/app.css">
        <link rel="shortcut icon" href="<?= base_url() ?>/mazer/dist/assets/images/favicon.svg" type="image/x-icon">

    </head>
    <body>
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="<?= base_url() ?>/mazer/dist/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
        
                        <li class="sidebar-item  ">
                            <a href="index" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>User</span>
                            </a>
                        </li>
        
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Berita</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="component-alert.html">Data Berita</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="kategori/">Kategori</a>
                                </li>
        
                            </ul>
                        </li>
        
        
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3><?= $title; ?></h3>
                        <p class="text-subtitle text-muted">For user to check they list</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
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
                            <div>
                            </div>
        
                        </div>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
        
            </section>
        </div>
        
    </body>
    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Mazer</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">A. Saugi</a></p>
            </div>
        </div>
    </footer>
    <script src="mazer/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="mazer/dist/assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="mazer/dist/assets/js/mazer.js"></script>
    <script src="mazer/dist/assets/vendors/simple-datatables/simple-datatables.js"></script>
</html>


