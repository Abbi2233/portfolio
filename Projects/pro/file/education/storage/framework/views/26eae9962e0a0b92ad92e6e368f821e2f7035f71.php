<?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-6 col-xl-3">
    <!-- Simple card -->
    <div class="card">

        <div class="card-body">

            <h4 class="card-title">Notes Title</h4>
            <p class="card-text"><?php echo e($val->notes_title); ?></p>

            <h4 class="card-title">Notes Content</h4>
            <p class="card-text"><?php echo e($val->notes); ?></p>

        </div>
        <div class="row">
            <Button class="badge bg-danger font-size-12 ml-3 m-2 delete" data-id="<?php echo e($val->id); ?>">Delete Notes</Button>
            <Button class="badge bg-success font-size-12 m-2 viewnotes" data-toggle="modal" data-id="<?php echo e($val->id); ?>" data-notes="<?php echo e($val->notes_title); ?>" data-title="<?php echo e($val->notes_title); ?>" data-target="#viewnotes" >View Notes</Button>
        </div><!-- end col -->
    </div>
    <!-- end row -->
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\education\resources\views/Student/noteslist.blade.php ENDPATH**/ ?>