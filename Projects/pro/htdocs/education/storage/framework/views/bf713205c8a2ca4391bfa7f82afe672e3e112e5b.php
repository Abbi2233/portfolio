<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Education</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?php echo e(URL::to('storage/app/public/Adminassets/css/bootstrap.min.css')); ?>" id="bootstrap-style"
        rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo e(URL::to('storage/app/public/Adminassets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo e(URL::to('storage/app/public/Adminassets/css/app.min.css')); ?>" id="app-style" rel="stylesheet"
        type="text/css" />
    <?php echo $__env->yieldContent('css'); ?>
</head>

<body data-topbar="dark" data-layout="horizontal">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php echo $__env->make('includes.Admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('includes.Admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <!-- JAVASCRIPT -->
        <script src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/metismenu/metisMenu.min.js')); ?>"></script>
        <script src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/simplebar/simplebar.min.js')); ?>"></script>
        <script src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/node-waves/waves.min.js')); ?>"></script>

        <?php echo $__env->yieldContent('js'); ?>


        <script src="<?php echo e(URL::to('storage/app/public/Adminassets/js/app.js')); ?>"></script>

</body>

</html><?php /**PATH C:\xampp\htdocs\education\resources\views/layouts/admin.blade.php ENDPATH**/ ?>