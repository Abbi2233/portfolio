<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Signup | <?php echo e(env('APP_NAME')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(URL::to('storage/app/public/Adminassets/images/favicon.ico')); ?>">

    <!-- Bootstrap Css -->
    <link href="<?php echo e(URL::to('storage/app/public/Adminassets/css/bootstrap.min.css')); ?>" id="bootstrap-style"
        rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo e(URL::to('storage/app/public/Adminassets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo e(URL::to('storage/app/public/Adminassets/css/app.min.css')); ?>" id="app-style" rel="stylesheet"
        type="text/css" />

</head>

<body>

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign Up to continue to <?php echo e(env('APP_NAME')); ?>.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="<?php echo e(URL::to('storage/app/public/Adminassets/images/profile-img.png')); ?>"
                                        alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="#">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="<?php echo e(URL::to('storage/app/public/Adminassets/images/logo.svg')); ?>"
                                                alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">

                                <?php echo e(Form::open(array('url'=>'/signup','method'=>'post','name'=>'login'))); ?>

                                <div class="form-group">
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="user" id="usertype"
                                                value="2" checked="">
                                            <label class="form-check-label" for="usertype">Student</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="user" id="usertype"
                                                value="1">
                                            <label class="form-check-label" for="usertype">Teacher</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username">Fullname</label>
                                    <input type="text" class="form-control" id="username" name="Fullname"
                                        placeholder="Enter Fullname" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <input type="text" class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="username" name="email" placeholder="Enter Email" required>
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
                                <div class="form-group">
                                    <label for="username">Phone</label>
                                    <input type="number" class="form-control" id="phone" name="phone"
                                        placeholder="Enter phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="userpassword">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirmpass" name="confirmpass"
                                        placeholder="Enter Confirm Password" required>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert" >
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="userpassword" name="password" placeholder="Enter password" required>
                                    <?php $__errorArgs = ['password'];
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
                                <div class="form-group">
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gendermale"
                                                value="male" checked="">
                                            <label class="form-check-label" for="gendermale">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="genderfemale"
                                                value="female">
                                            <label class="form-check-label" for="genderfemale">Female</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <?php echo e(Form::submit('Regigster',array('class'=>'btn btn-primary btn-block waves-effect waves-light'))); ?>

                                </div>

                                <div class="mt-4 text-center">
                                    <a href="<?php echo e(URL::to('/login')); ?>" class="text-muted"> Login
                                        </a>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <p>© 2020<i class="mdi mdi-heart text-danger"></i> by Rajesh</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html><?php /**PATH C:\xampp\htdocs\education\resources\views/Admin/Auth/signup.blade.php ENDPATH**/ ?>