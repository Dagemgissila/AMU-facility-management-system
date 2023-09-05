<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">ADMIN PAGE</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active ">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('admin/account/*') ? 'show' : '' }}" href="#"
            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="{{ Request::is('admin/account/*') ? 'true' : 'false' }}"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Manage Account</span>
        </a>
        <div id="collapseTwo" class="collapse{{ Request::is('admin/account/*') ? ' show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item{{ Request::is('admin/account/createaccount') ? ' bg-info text-white font-weight-bold' : '' }}"
                    href="{{ route('admin.createaccount') }}">Create Account</a>
                <a class="collapse-item{{ Request::is('admin/account/viewaccount') ? ' bg-info text-white font-weight-bold' : '' }}"
                    href="{{ route('admin.viewaccount') }}">View Account</a>
            </div>
        </div>
    </li>







    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>
