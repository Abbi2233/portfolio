<?php $__env->startSection('title'); ?>
Create User
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
                    <h4 class="mb-0 font-size-18">Add Verify Address</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('la-admin/')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Verify Address</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <?php echo e(Form::open(array('url'=>'la-admin/user','method'=>'post','name'=>'create-user','class'=>'custom-validation','files'=>'true'))); ?>


                        <div class="form-group row ">
                            <div class="col-sm-6">
                                <label>Address Name*</label>
                                <?php echo e(Form::text('addressname','',array('class'=>$errors->has('name') ?'form-control is-invalid' : 'form-control','placeholder'=>'Address','required'))); ?>

                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-sm-6">
                                <label>Name*</label>
                                <?php echo e(Form::text('name','',array('class'=>$errors->has('name') ?'form-control is-invalid' : 'form-control','placeholder'=>'Name','required'))); ?>

                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Phone Number</label>
                                <?php echo e(Form::text('phone_no','',array('class'=>$errors->has('phone_no') ?'form-control is-invalid' : 'form-control','placeholder'=>'Enter Phone Number','required','data-parsley-type'=>'number'))); ?>

                                <?php $__errorArgs = ['phone_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-sm-6">
                                <label>Company / Organization</label>
                                <input type="text" class="form-control" name="company"
                                    placeholder="Company / Organization">
                                <?php $__errorArgs = ['phone_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="email">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-sm-6">
                                <label>Address Line 1</label>
                                <input type="text" class="form-control" placeholder="Address line 1">
                                <?php $__errorArgs = ['adress1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert" name="address1">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Address Line 2</label>
                                <input type="text" class="form-control" name="address2" placeholder="Address line 2">
                                <?php $__errorArgs = ['adress2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-sm-6">
                                <label>Address Line 3</label>
                                <input type="text" class="form-control" name="address3" placeholder="Address line 3">
                                <?php $__errorArgs = ['adress3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Country</label>
                                <select type="text" class="form-control" name="country">
                                    <option> Select Country </option>
                                    <option> United State </option>
                                    <option>Canada</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>City</label>
                                <input type="text" class="form-control" name="city" placeholder="Enter City">
                            </div>
                            <div class="col-sm-3">
                                <label>State</label>
                                <select type="text" class="form-control" name="state">
                                    <option> Select State </option>
                                    <option> United State </option>
                                    <option>Canada</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Zip / Postal</label>
                                <input type="text" placeholder="Zip" class="form-control" name="zip">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Tax Id</label>
                                <input type="text" class="form-control" name="tax" placeholder="Enter Tax">
                            </div>
                            <div class="col-sm-3">
                                <label></label>
                                <div>
                                    <div class="form-check  mb-3 form-check-inline">
                                        <input class="form-check-input" name="Residential" type="checkbox"
                                            id="Residential">
                                        <label class="form-check-label" for="Residential">
                                            Is Residential
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                            <label></label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="active"
                                        id="active" value="1" checked="">
                                    <label class="form-check-label" for="card_text_alignment_left">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="active"
                                        id="inactive" value="2">
                                    <label class="form-check-label" for="card_text_alignment_center">InActive</label>
                                </div>
                            </div>
                        </div>
                        </div>

                        


                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                    Submit
                                </button>
                                <a href="<?php echo e(URL::to('la-admin/user')); ?>" type="reset"
                                    class="btn btn-secondary waves-effect">
                                    Cancel
                                </a>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(URL::to('storage/app/public/Adminassets/libs/parsleyjs/parsley.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('storage/app/public/Adminassets/js/pages/form-validation.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vishal\resources\views/Admin/Adress/addressverify.blade.php ENDPATH**/ ?>