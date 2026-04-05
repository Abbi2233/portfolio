<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Welcome to Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-4">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p><?php echo e(env('APP_NAME')); ?> Dashboard</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="<?php echo e(URL::to('storage/app/public/Adminassets/images/profile-img.png')); ?>" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <?php if(file_exists(storage_path('app/public/user/'.Auth::user()->profile_pic)) &&
                                    Auth::user()->profile_pic != ''): ?>
                                    <img src="<?php echo e(URL::to('storage/app/public/user/'.Auth::user()->profile_pic)); ?>"
                                        class="img-thumbnail rounded-circle" alt="user">
                                    <?php else: ?>
                                    <img src="<?php echo e(URL::to('storage/app/public/default/default_user.jpg')); ?>"
                                        class="img-thumbnail rounded-circle" alt="user">
                                    <?php endif; ?>
                                </div>
                                <h5 class="font-size-15 text-truncate"><?php echo e(Auth::user()->name); ?></h5>
                                <p class="text-muted mb-0 text-truncate">Admin User</p>
                            </div>

                            <div class="col-sm-8">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted font-weight-medium">Address Managment</p>
                                        <h4 class="mb-0">-</h4>
                                    </div>

                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted font-weight-medium">Rate Managment</p>
                                        <h4 class="mb-0">-</h4>
                                    </div>

                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-archive-in font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted font-weight-medium">Ship Managment</p>
                                        <h4 class="mb-0">-</h4>
                                    </div>

                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end row -->
</div>
<!-- container-fluid -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<!-- apexcharts -->
<script src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/apexcharts/apexcharts.min.js')); ?>"></script>

<script src="<?php echo e(URL::to('storage/app/public/Adminassets/js/pages/dashboard.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vishal\resources\views/Admin/dashboard.blade.php ENDPATH**/ ?>