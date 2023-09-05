<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">Technician</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active ">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link" href="{{route('technician.requestItem')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span> Requested Item</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('technician.assignedWork')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span> My Assigned Work</span></a>
    </li>

    <li class="nav-item  ">
        <a class="nav-link" href="{{route('manager.ViewResilience')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Notification</span></a>
    </li>


    <li class="nav-item  ">
        <a class="nav-link" href="{{route('manager.ViewResilience')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Change Password</span></a>
    </li>








    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>
