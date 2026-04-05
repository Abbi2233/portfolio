<?php $__currentLoopData = $que; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-md-6 col-xl-3">
    <!-- Simple card -->
    <div class="card">

        <div class="card-body">

            <h4 class="card-title">Student Name</h4>
            <p class="card-text"><?php echo e($val->user->name); ?></p>

            <h4 class="card-title">Course Name</h4>
            <p class="card-text"><?php echo e($val->course->coursename); ?></p>

            <h4 class="card-title">Question</h4>
            <p class="card-text">
            <?php echo e($val->question); ?>

            </p>
            <h4 class="card-title">Submit Date</h4>
            <p class="card-text">
               <?php echo e($val->created_at); ?>

            </p>
            <?php if($val->reply ==''): ?>
            <span class="label label-warning" style="color:blue">Awaiting Reply</span>
            <?php else: ?>
            <Button class="badge bg-success font-size-15 m-3 viewanswer" style="text-align:center" data-answer="<?php echo e($val->reply); ?>" data-que="<?php echo e($val->question); ?>" data-toggle="modal" data-target="#Answer" >View Answer</Button>
            <?php endif; ?>
        </div>
        
    </div>
    <!-- end row -->
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\education\resources\views/Student/questionslist.blade.php ENDPATH**/ ?>