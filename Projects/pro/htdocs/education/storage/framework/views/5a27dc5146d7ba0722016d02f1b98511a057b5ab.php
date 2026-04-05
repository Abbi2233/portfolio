<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="<?php echo e(URL::to('la-admin')); ?>" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span>Address Managment</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(URL::to('la-admin/address')); ?>">Adress List</a></li>         
                        <li><a href="<?php echo e(URL::to('la-admin/addressverify')); ?>">Add Verify Address</a></li>           
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span>Rate Managment</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(URL::to('la-admin/sticker/create')); ?>">List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-image"></i>
                        <span>Ship Managment</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(URL::to('la-admin/shiplist')); ?>">Shiplist</a></li>
                    </ul>
                </li>
               
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vishal\resources\views/includes/Admin/sidebar.blade.php ENDPATH**/ ?>