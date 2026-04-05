<?php $__env->startSection('title'); ?>
    User
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::to('storage/app/public/Adminassets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>"
          rel="stylesheet" type="text/css"/>
    <link
        href="<?php echo e(URL::to('storage/app/public/Adminassets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>"
        rel="stylesheet" type="text/css"/>

    <!-- Responsive datatable examples -->
    <link
        href="<?php echo e(URL::to('storage/app/public/Adminassets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>"
        rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Address Managment</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('la-admin/')); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active">Address</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-md-12">
                    <?php if(Session::has('message')): ?>
                        <?php echo Session::get('message'); ?>

                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <table id="datatable-buttons"
                                   class="table table-striped table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Profile Pic</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>#<?php echo e($row->id); ?></td>
                                        <td><?php echo e($row->name); ?></td>
                                        <td><?php echo e($row->email); ?></td>
                                        <td><?php echo e($row->phone_no); ?></td>
                                        <td>
                                            <?php if(file_exists(storage_path('app/public/user/'.$row->profile_pic)) && $row->profile_pic != ''): ?>
                                                <img src="<?php echo e(URL::to('storage/app/public/user/'.$row->profile_pic)); ?>"
                                                     class="rounded avatar-sm"
                                                     alt="user">
                                            <?php else: ?>
                                                <img src="<?php echo e(URL::to('storage/app/public/default/default_user.jpg')); ?>"
                                                     class="rounded avatar-sm"
                                                     alt="user">
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(@$row->roles->first()->display_name); ?> <?php if($row->roles->first()->display_name == 'Admin'): ?>
                                                <i class="bx bx-check-double text-success"></i><?php endif; ?> </td>
                                        <td>
                                            <a href="<?php echo e(URL::to('la-admin/user/'.$row->id.'/status')); ?>">
                                                <span
                                                    class="badge badge-pill  <?php echo e($row->status == 'active' ? 'badge-success' : 'badge-danger'); ?>"><?php echo e($row->status); ?></span>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-success btn-sm btn-add btn-edit-vendor"
                                               href="<?php echo e(URL::to('la-admin/user/'.$row->id.'/edit')); ?>"><i
                                                    class="bx bx-edit-alt"></i></a>
                                            <?php if(@$row->roles->first()->display_name != 'Admin'): ?>
                                                <a class="btn btn-danger btn-sm btn-add btn-edit-vendor"
                                                   href="<?php echo e(URL::to('la-admin/user/'.$row->id.'/edit')); ?>"><i
                                                        class="bx bx-trash-alt"></i></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <!-- Required datatable js -->
    <script
        src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script
        src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <!-- Buttons examples -->
    <script
        src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script
        src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/pdfmake/build/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/pdfmake/build/vfs_fonts.js')); ?>"></script>
    <script
        src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script
        src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script
        src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/datatables.net-buttons/js/buttons.colVis.min.js')); ?>"></script>
    <!-- Responsive examples -->
    <script
        src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script
        src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>

    <!-- Datatable init js -->
    <script src="<?php echo e(URL::to('storage/app/public/Adminassets/js/pages/datatables.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vishal\resources\views/Admin/Adress/index.blade.php ENDPATH**/ ?>