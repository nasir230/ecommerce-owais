<div class="menu">
    <ul class="list">
            <li class="active" >
                <div class="sidebar-profile clearfix">
                    <div class="profile-img">
                        <img src="<?php echo e(asset(Auth::user()->profile->photo)); ?>" alt="profile">
                    </div>
                    <div class="profile-info">
                        <h3><?php echo e(auth::user()->name); ?></h3>
                        <p>Welcome <?php echo e(auth::user()->role->name); ?> !</p>
                    </div>
                </div>
            </li>

           <li class="">
                <a href="<?php echo e(route('admin.home')); ?>">
                     <i class="menu-icon ti-home"></i>
                     <span>Dashboard</span>
                </a>
                 <ul class="ml-menu"></ul>
           </li>
    
           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.management_access','none')): ?>
                <li class="<?php echo e((request()->segment(2) == 'users') ? 'active' : ''); ?>">
                    <a href="#"  class="menu-toggle <?php echo e((request()->segment(2) == 'users') ? 'toggled' : ''); ?>">
                        <i class="menu-icon ti-user"></i>
                        <span>Users Management</span>
                    </a>
                  <ul class="ml-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.view_all','none')): ?>
                    <li class="" >
                      <a href="<?php echo e(route('admin.users.index')); ?>">All Users</a>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.create','none')): ?>
                    <li class="" >
                      <a href="<?php echo e(route('admin.users.create')); ?>">Create User</a>
                    </li>
                    <?php endif; ?>
                  </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.access','none')): ?>
                <li class="<?php echo e((request()->segment(2) == 'roles') ? 'active' : ''); ?>">
                    <a href="#"  class="menu-toggle <?php echo e((request()->segment(2) == 'roles') ? 'toggled' : ''); ?>">
                        <i class="menu-icon ti-wand"></i>
                        <span>Roles Management</span>
                    </a>
                  <ul class="ml-menu">
                    <li class="" >
                      <a href="<?php echo e(route('admin.roles.index')); ?>">All Roless</a>
                    </li>
                    <li class="" >
                      <a href="<?php echo e(route('admin.roles.create')); ?>">Create Role</a>
                    </li>
                  </ul>
                </li>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.access_permissions','none')): ?>
                    <li class="<?php echo e((request()->segment(2) == 'permissions') ? 'active' : ''); ?>">
                        <a href="#"  class="menu-toggle <?php echo e((request()->segment(2) == 'permissions') ? 'toggled' : ''); ?>">
                            <i class="menu-icon ti-lock"></i>
                            <span>Permissions Management</span>
                        </a>
                    <ul class="ml-menu">
                        <li class="" >
                        <a href="<?php echo e(route('admin.permissions.index')); ?>">All Permissions</a>
                        </li>
                        <li class="" >
                        <a href="<?php echo e(route('admin.permissions.create')); ?>">Create Permission</a>
                        </li>
                    </ul>
                    </li>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('modules.categories','none')): ?>
            <li class="<?php echo e((request()->segment(2) == 'categories') ? 'active' : ''); ?>">
                <a href="#"  class="menu-toggle <?php echo e((request()->segment(2) == 'categories') ? 'toggled' : ''); ?>">
                    <i class="menu-icon ti-bookmark-alt"></i>
                    <span>Categories Management</span>
                </a>
                <ul class="ml-menu">
                    <li class="" ><a href="<?php echo e(route('admin.categories.index')); ?>">Parent Categories</a></li>
                    <li class="" ><a href="<?php echo e(route('admin.categories.sub')); ?>">Child Categories</a></li>
                </ul>
           </li>
           <?php endif; ?>

           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('modules.products','none')): ?>
           <li class="<?php echo e((request()->segment(2) == 'products') ? 'active' : ''); ?>">
            <a href="#"  class="menu-toggle <?php echo e((request()->segment(2) == 'products') ? 'toggled' : ''); ?>">
                <i class="menu-icon ti-briefcase"></i>
                <span>Products Management</span>
            </a>
            <ul class="ml-menu">
                <li class="" ><a href="<?php echo e(route('admin.products.index')); ?>">All Products</a></li>
                <li class="" ><a href="<?php echo e(route('admin.products.create')); ?>">Create Products</a></li>
            </ul>
          </li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('modules.inquiries','none')): ?>
            <li class="<?php echo e((request()->segment(2) == 'forms') ? 'active' : ''); ?>">
                <a href="#"  class="menu-toggle <?php echo e((request()->segment(2) == 'forms') ? 'toggled' : ''); ?>">
                    <i class="menu-icon ti-wand"></i>
                    <span>Inquiries Management</span>
                </a>
                <ul class="ml-menu">
                    <li class="" ><a href="<?php echo e(route('admin.forms.index')); ?>">All Inquiries</a></li>
                    <li class="" ><a href="<?php echo e(route('admin.forms.create')); ?>">Create Inquiries</a></li>
                </ul>
            </li>
          <?php endif; ?>

         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('modules.filemanager','none')): ?>
                <li class="<?php echo e((request()->segment(2) == 'filemanager') ? 'active' : ''); ?>">
                    <a href="#"  class="menu-toggle <?php echo e((request()->segment(2) == 'filemanager') ? 'toggled' : ''); ?>">
                        <i class="menu-icon ti-files"></i>
                        <span>Filemanager </span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="<?php echo e(route('admin.filemanager.index')); ?>">FileList</a>
                        </li>
                    </ul>
                </li>
         <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('modules.news','none')): ?>
                <li class="<?php echo e((request()->segment(2) == 'news') ? 'active' : ''); ?>">
                    <a href="#"  class="menu-toggle <?php echo e((request()->segment(2) == 'news') ? 'toggled' : ''); ?>">
                        <i class="menu-icon ti-receipt"></i>
                        <span>Blog</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="" >
                            <a href="<?php echo e(route('admin.news.index')); ?>">All Blog</a>
                        </li>
                        <li class="" >
                            <a href="<?php echo e(route('admin.news.create')); ?>">Create Blog</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('modules.chat','none')): ?>
                <li class="<?php echo e((request()->segment(2) == 'chat') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.chat')); ?>">
                        <i class="menu-icon ti-email"></i>
                        <span>Chat</span>
                    </a>
                    <ul class="ml-menu"></ul>
                </li>
            <?php endif; ?>
    
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('settings.access','none')): ?>
                <li class="<?php echo e((request()->segment(2) == 'settings') ? 'active' : ''); ?>">
                    <a href="#"  class="menu-toggle <?php echo e((request()->segment(2) == 'settings') ? 'toggled' : ''); ?>">
                        <i class="menu-icon ti-settings"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="ml-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('settings.general','none')): ?>
                        <li class="" >
                            <a href="<?php echo e(route('admin.settings.app')); ?>">Genral</a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('settings.shop','none')): ?>
                        <li class="" >
                            <a href="<?php echo e(route('admin.settings.shop')); ?>">Shop</a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('settings.home','none')): ?>
                        <li class="" >
                            <a href="<?php echo e(route('admin.settings.home')); ?>">Home</a>
                        </li>
                        <?php endif; ?>
                        
                     
                    </ul>
                </li>
            <?php endif; ?>

    </ul>
</div>


        
<?php /**PATH C:\xampp\htdocs\zmark\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>