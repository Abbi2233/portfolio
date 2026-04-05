<?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-6 col-xl-3">
    <!-- Simple card -->
    <div class="card">

        <div class="card-body">

            <h4 class="card-title">Course Name</h4>
            <p class="card-text"><?php echo e($val->coursename); ?></p>


            <h4 class="card-title">Course Code</h4>
            <p class="card-text"><?php echo e($val->coursecode); ?></p>

            <h4 class="card-title">Description</h4>
            <p class="card-text">
            <?php echo e($val->description); ?>

            </p>
            <h4 class="card-title">Created At</h4>
            <p class="card-text">
               <?php echo e($val->created_at); ?>

            </p>
            <h4 class="card-title">Tutor Name</h4>
            <p class="card-text">
            <?php echo e($val->user->name); ?>

            </p>
        </div>
        <div class="row">
            <Button class="badge bg-danger font-size-12 ml-3 m-2 delete" data-id="<?php echo e($val->id); ?>">Delete Course</Button>
            <Button class="badge bg-primary font-size-12 m-2 editcourse" data-id="<?php echo e($val->id); ?>" data-toggle="modal" data-target="#editcourse">Edit Course</Button>
            <a href="<?php echo e(URL::to('/admin/viewcourse',$val->id)); ?>" class="badge bg-success font-size-12 m-2">View Course</a>
        </div><!-- end col -->
    </div>
    <!-- end row -->
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\education\resources\views/Admin/courselist.blade.php ENDPATH**/ ?>