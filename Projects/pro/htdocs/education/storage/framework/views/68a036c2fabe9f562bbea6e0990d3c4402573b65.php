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
            <div class="col-4">
                <div class="page-title-box d-flex align-items-center">
                    <h4 class="mb-0 font-size-18 m-2">My question</h4>
                    <a href="#" class="btn btn-success btn-sm  mb-2" data-toggle="modal" data-target="#addquestion"><i
                            class="fas fa-plus mr-1"></i> Ask a Question</a>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row" id="questionlist">
            <?php echo $__env->make('Student.questionslist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- add course model -->
        <div class="modal fade text-left" id="addquestion" tabindex="-1" role="dialog" aria-labelledby="RditProduct"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title text-text-bold-600" id="RditProduct">QUESTION</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="errors" style="color: red;"></div>
                    <form method="post" id="addquestion_form">
                        <?php echo e(csrf_field()); ?>

                        <div class="modal-body">
                            <label>Select Course</label>
                            <div class="form-group">
                                <select class="form-control"  name="courseId" id="courseId" required>
                                    <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($val->id); ?>"> <?php echo e($val->coursename); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <label>Question Content</label>
                            <div class="form-group">
                                <textarea type="text" placeholder="Enter Question Content" class="form-control" name="que_desc" id="que_desc" required></textarea>
                            </div>
                        </div>
                        <div id="errors"></div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                                value="close">
                            <input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end -->
        <!-- view answer -->
        <div class="modal fade text-left" id="Answer" tabindex="-1" role="dialog" aria-labelledby="RditProduct"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title text-text-bold-600" id="RditProduct">Answer</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="errors" style="color: red;"></div>
                    <form method="post" >
                        <?php echo e(csrf_field()); ?>

                        <div class="modal-body">
                            <label>Question</label>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    name="viewquestion" id="viewquestion" disabled>
                            </div>
                            <label>Answer</label>
                            <div class="form-group">
                                <input type="text"  class="form-control"
                                    name="viewanswer" id="viewanswer" disabled>
                            </div>
                            </div>
                        </div>
                        <div id="errors"></div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                                value="close">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('js'); ?>
    <!-- apexcharts -->
    <script src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/apexcharts/apexcharts.min.js')); ?>"></script>

    <script src="<?php echo e(URL::to('storage/app/public/Adminassets/js/pages/dashboard.init.js')); ?>"></script>
    <script style="text/javascript">
    // Add category

    $('#addquestion_form').on('submit', function(e) {
        e.preventDefault();
        var fd = new FormData(this);
        $.ajax({
            url: '<?php echo e(URL::to("/student/addquestion")); ?>',
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#addquestion').modal('hide');
                 questionlist();
            },
            error: function(response) {
                var msg = response.responseJSON.message;
                $('.loader').hide();
                alertshow("Alert", msg, "warning");
            }
        });
    });

    function questionlist() {

        $.ajax({
            url: '<?php echo e(URL::to("/student/questionlist")); ?>',
            method: 'get',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#questionlist').html(response);
            },
            error: function(response) {}
        });

    }

    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
        var ajaxurl = '<?php echo e(URL::to("admin/deletecourse")); ?>';
        if (confirm('Are you sure you want to delete this?')) {
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    "id": id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    getcourselist();
                }
            });
        }
    });  

    $(document).on('click', '.editcourse', function() {
        var id = $(this).data('id');
        var ajaxurl = '<?php echo e(URL::to("admin/editcoursedata")); ?>';
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    "id": id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $('#edit_coursename').val(data.coursename);
                    $('#edit_corsecode').val(data.coursecode);
                    $('#edit_coursedesc').text(data.description);
                    $('#courseId').attr('value',data.id);
                }
            });
    });

    $('#editcourse_form').on('submit', function(e) {
        e.preventDefault();
        var fd = new FormData(this);
        $.ajax({
            url: '<?php echo e(URL::to("/admin/updatecourse")); ?>',
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#editcourse').modal('hide');
                getcourselist();
            },
            error: function(response) {
                var msg = response.responseJSON.message;
                $('.loader').hide();
                alertshow("Alert", msg, "warning");
            }
        });
    });

    $(document).on('click', '.viewanswer', function() {
        var answer = $(this).data('answer');
        var question = $(this).data('que');
        $('#viewquestion').val(question);
        $('#viewanswer').attr('value',answer);
    });

    

    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\education\resources\views/Student/myquestions.blade.php ENDPATH**/ ?>