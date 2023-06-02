
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link bg-white" style="height: 57px;">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <img src="#" alt="" class="w-75 ml-3" style="margin-top:-20px">
        <!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
      </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ route('admin.home') }}" class="nav-link {{ Request::routeIs('admin.home') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.service.index') }}" class="nav-link {{ Request::routeIs('admin.service.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-microchip"></i>
                        <p>Manage Services</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.blog.index') }}" class="nav-link {{ Request::routeIs('admin.blog.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-pen-to-square"></i>
                        <p>Manage Blogs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.blog.comment') }}" class="nav-link {{ Request::routeIs('admin.blog.comment') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-pen-to-square"></i>
                        <p>Blogs Comment</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.faq.index') }}" class="nav-link {{ Request::routeIs('admin.faq.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-link nav-icon"></i>
                        <p>Manage Faq</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.page.index') }}" class="nav-link {{ Request::routeIs('admin.page.index') ? 'active' : '' }}">
                        <i class="far fa-solid fa-hammer nav-icon"></i>
                        <p>Manage Pages</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link {{ Request::routeIs('admin.user.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-user nav-icon"></i>
                        <p>Manage Users</p>
                    </a>
                </li>
                <li onclick="submanuclick();" class="submanuclass nav-item">
                    <a href="{{ route('admin.setting.indexwithedit') }}" class="nav-link {{ Request::routeIs('admin.setting.indexwithedit') ? 'active' : '' }}" >
                        <i class="far fa-solid fa-sliders nav-icon"></i>
                        <p>Settings</p>
                    </a>
                </li>
                <li onclick="submanuclick();" class="submanuclass nav-item">
                    <a href="{{ route('admin.manu.list') }}" class="nav-link {{ Request::routeIs('admin.setting.indexwithedit') ? 'active' : '' }}" >
                        <i class="far fa-solid fa-sliders nav-icon"></i>

                        <p>Manu</p>
                    </a>
                </li>
                <li class="nav-item">
                    {{-- <a href="{{ url('/logout') }}" class="nav-link"> --}}
                        <a class="dropdown-item nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        <i class='fas fa-sign-out-alt nav-icon'></i>

                        <p>Logout</p>
                     </a>

                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    function submanuclick(){



    }
</script>
