<div class="menu">
    <ul class="list">
            <li class="active" >
                <div class="sidebar-profile clearfix">
                    <div class="profile-img">
                        <img src="{{asset(Auth::user()->profile->photo)}}" alt="profile">
                    </div>
                    <div class="profile-info">
                        <h3>{{auth::user()->name}}</h3>
                        <p>Welcome {{auth::user()->role->name}} !</p>
                    </div>
                </div>
            </li>

           <li class="">
                <a href="{{route('admin.home')}}">
                     <i class="menu-icon ti-home"></i>
                     <span>Dashboard</span>
                </a>
                 <ul class="ml-menu"></ul>
           </li>
    
           @can('users.management_access','none')
                <li class="{{(request()->segment(2) == 'users') ? 'active' : '' }}">
                    <a href="#"  class="menu-toggle {{(request()->segment(2) == 'users') ? 'toggled' : '' }}">
                        <i class="menu-icon ti-user"></i>
                        <span>Users Management</span>
                    </a>
                  <ul class="ml-menu">
                    @can('users.view_all','none')
                    <li class="" >
                      <a href="{{route('admin.users.index')}}">All Users</a>
                    </li>
                    @endcan
                    @can('users.create','none')
                    <li class="" >
                      <a href="{{route('admin.users.create')}}">Create User</a>
                    </li>
                    @endcan
                  </ul>
                </li>
            @endcan

            @can('roles.access','none')
                <li class="{{(request()->segment(2) == 'roles') ? 'active' : '' }}">
                    <a href="#"  class="menu-toggle {{(request()->segment(2) == 'roles') ? 'toggled' : '' }}">
                        <i class="menu-icon ti-wand"></i>
                        <span>Roles Management</span>
                    </a>
                  <ul class="ml-menu">
                    <li class="" >
                      <a href="{{route('admin.roles.index')}}">All Roless</a>
                    </li>
                    <li class="" >
                      <a href="{{route('admin.roles.create')}}">Create Role</a>
                    </li>
                  </ul>
                </li>
            @endcan
            
            @can('roles.access_permissions','none')
                    <li class="{{(request()->segment(2) == 'permissions') ? 'active' : '' }}">
                        <a href="#"  class="menu-toggle {{(request()->segment(2) == 'permissions') ? 'toggled' : '' }}">
                            <i class="menu-icon ti-lock"></i>
                            <span>Permissions Management</span>
                        </a>
                    <ul class="ml-menu">
                        <li class="" >
                        <a href="{{route('admin.permissions.index')}}">All Permissions</a>
                        </li>
                        <li class="" >
                        <a href="{{route('admin.permissions.create')}}">Create Permission</a>
                        </li>
                    </ul>
                    </li>
            @endcan
            
            @can('modules.categories','none')
            <li class="{{(request()->segment(2) == 'categories') ? 'active' : '' }}">
                <a href="#"  class="menu-toggle {{(request()->segment(2) == 'categories') ? 'toggled' : '' }}">
                    <i class="menu-icon ti-bookmark-alt"></i>
                    <span>Categories Management</span>
                </a>
                <ul class="ml-menu">
                    <li class="" ><a href="{{route('admin.categories.index')}}">Parent Categories</a></li>
                    <li class="" ><a href="{{route('admin.categories.sub')}}">Child Categories</a></li>
                </ul>
           </li>
           @endcan

           @can('modules.products','none')
           <li class="{{(request()->segment(2) == 'products') ? 'active' : '' }}">
            <a href="#"  class="menu-toggle {{(request()->segment(2) == 'products') ? 'toggled' : '' }}">
                <i class="menu-icon ti-briefcase"></i>
                <span>Products Management</span>
            </a>
            <ul class="ml-menu">
                <li class="" ><a href="{{route('admin.products.index')}}">All Products</a></li>
                <li class="" ><a href="{{route('admin.products.create')}}">Create Products</a></li>
            </ul>
          </li>
          @endcan

          @can('modules.inquiries','none')
            <li class="{{(request()->segment(2) == 'forms') ? 'active' : '' }}">
                <a href="#"  class="menu-toggle {{(request()->segment(2) == 'forms') ? 'toggled' : '' }}">
                    <i class="menu-icon ti-wand"></i>
                    <span>Inquiries Management</span>
                </a>
                <ul class="ml-menu">
                    <li class="" ><a href="{{route('admin.forms.index')}}">All Inquiries</a></li>
                    <li class="" ><a href="{{route('admin.forms.create')}}">Create Inquiries</a></li>
                </ul>
            </li>
          @endcan

         @can('modules.filemanager','none')
                <li class="{{(request()->segment(2) == 'filemanager') ? 'active' : '' }}">
                    <a href="#"  class="menu-toggle {{(request()->segment(2) == 'filemanager') ? 'toggled' : '' }}">
                        <i class="menu-icon ti-files"></i>
                        <span>Filemanager </span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{route('admin.filemanager.index')}}">FileList</a>
                        </li>
                    </ul>
                </li>
         @endcan

            @can('modules.news','none')
                <li class="{{(request()->segment(2) == 'news') ? 'active' : '' }}">
                    <a href="#"  class="menu-toggle {{(request()->segment(2) == 'news') ? 'toggled' : '' }}">
                        <i class="menu-icon ti-receipt"></i>
                        <span>Blog</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="" >
                            <a href="{{route('admin.news.index')}}">All Blog</a>
                        </li>
                        <li class="" >
                            <a href="{{route('admin.news.create')}}">Create Blog</a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('modules.chat','none')
                <li class="{{(request()->segment(2) == 'chat') ? 'active' : '' }}">
                    <a href="{{route('admin.chat')}}">
                        <i class="menu-icon ti-email"></i>
                        <span>Chat</span>
                    </a>
                    <ul class="ml-menu"></ul>
                </li>
            @endcan
    
            @can('settings.access','none')
                <li class="{{(request()->segment(2) == 'settings') ? 'active' : '' }}">
                    <a href="#"  class="menu-toggle {{(request()->segment(2) == 'settings') ? 'toggled' : '' }}">
                        <i class="menu-icon ti-settings"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="ml-menu">
                        @can('settings.general','none')
                        <li class="" >
                            <a href="{{route('admin.settings.app')}}">Genral</a>
                        </li>
                        @endcan
                        @can('settings.shop','none')
                        <li class="" >
                            <a href="{{route('admin.settings.shop')}}">Shop</a>
                        </li>
                        @endcan
                        @can('settings.home','none')
                        <li class="" >
                            <a href="{{route('admin.settings.home')}}">Home</a>
                        </li>
                        @endcan
                        
                     
                    </ul>
                </li>
            @endcan

    </ul>
</div>


        
