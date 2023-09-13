<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-text mx-3">User Page</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item {{Request::is('user/dashboard') ? 'bg-info font-weight-bold' : ''}} ">
        <a class="nav-link" href="{{route('staff.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">

    </div>
    <li class="nav-item {{Request::is('user/requestwork') ? 'bg-info font-weight-bold' : ''}}">
        <a class="nav-link" href="{{route('user.requestWork')}}">
            <i class="fas fa-wrench"></i>
            <span>Request Work Order</span>
        </a>
    </li>

    <li class="nav-item {{Request::is('user/workorder-status') ? 'bg-info font-weight-bold' : ''}}">
        <a class="nav-link" href="{{route('user.workOrderStatus')}}">
            <i class="fas fa-wrench"></i>
            <span>View Work Order status</span>
        </a>
    </li>


    <!-- Divider -->
    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Nav Item - Charts -->
    <li class="nav-item {{Request::is('users/changepassword') ? 'bg-info font-weight-bold' : ''}}">
        <a class="nav-link" href="{{route('user.changePassword')}}">
            <i class="fas fa-fw fa-lock"></i>
            <span>Change Password</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>
