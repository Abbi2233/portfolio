<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(env('APP_NAME')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(URL::to('storage/app/public/Adminassets/images/favicon.ico')); ?>">

    <!-- Bootstrap Css -->
    <link href="<?php echo e(URL::to('storage/app/public/Adminassets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo e(URL::to('storage/app/public/Adminassets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo e(URL::to('storage/app/public/Adminassets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
    <?php echo $__env->yieldContent('css'); ?>

</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

    <?php echo $__env->make('includes.Admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <!-- ========== Left Sidebar Start ========== -->

    <?php echo $__env->make('includes.Admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <?php echo $__env->yieldContent('content'); ?>

        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Rk.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Design & Develop by RK
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- JAVASCRIPT -->
<script src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/metismenu/metisMenu.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/simplebar/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/node-waves/waves.min.js')); ?>"></script>

<?php echo $__env->yieldContent('js'); ?>


<script src="<?php echo e(URL::to('storage/app/public/Adminassets/js/app.js')); ?>"></script>
</body>


</html>
<?php /**PATH C:\xampp\htdocs\vishal\resources\views/layouts/admin.blade.php ENDPATH**/ ?>