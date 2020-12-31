<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="#" onClick="return false;" class="bars"></a>
            <a class="navbar-brand" href="<?php echo e(route('admin.home')); ?>">
                <img src="<?php echo e(asset(Con::settings()->app_logo)); ?>" alt="" />
            </a>
        </div>
      
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="#" onClick="return false;" class="sidemenu-collapse">
                        <i class="nav-hdr-btn ti-align-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Full Screen Button -->
                <li class="fullscreen">
                    <a href="javascript:;" class="fullscreen-btn">
                        <i class="nav-hdr-btn ti-fullscreen"></i>
                    </a>
                </li>
                <!-- #END# Full Screen Button -->
                <li class="dropdown user_profile">
                    <div class="dropdown-toggle" data-toggle="dropdown">
                        <img style="width: 27px" src="<?php echo e(asset(Auth::user()->profile->photo)); ?>" alt="user">
                    </div>
                    <ul class="dropdown-menu pullDown">
                        <li class="body">
                            <ul class="user_dw_menu">
                                <li>
                                    <a href="<?php echo e(route('admin.users.profile',Auth::user()->id)); ?>" >
                                        <i class="material-icons">person</i>Profile
                                    </a>
                                </li>
                                <li>
                                <a href="<?php echo e(route('logoutuser')); ?>" >
                                        <i class="material-icons">highlight_off</i>Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar --><?php /**PATH C:\xampp\htdocs\zmark\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>