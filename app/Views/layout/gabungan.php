<!DOCTYPE html>
<html lang="en">

<?php include 'head.php' ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed" style="font-family:'Readex Pro', sans-serif;">
    <div class="wrapper">

        <!-- {%- include preloader.html -%} -->

        <?php include 'nav.php' ?>
        <?php include 'mainav.php' ?>

        <!-- {{ content }} -->
        <?= $this->renderSection('content') ?>

        <?php include 'footer.php' ?>
    </div>
    <?php include 'js.php' ?>
    <?= $this->renderSection('js') ?>

    <!-- {% include foot.html -%} -->
</body>

</html>