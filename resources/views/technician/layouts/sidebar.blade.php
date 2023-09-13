<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" >
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">Technician</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item  {{Request::is('technician/dashboard') ? 'bg-info font-weight-bold' : ''}} ">
        <a class="nav-link" href="{{route('technician.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Requested Item -->
    <li class="nav-item {{Request::is('technician/request-item') ? 'bg-info font-weight-bold' : ''}}"">
        <a class="nav-link" href="{{route('technician.requestItem')}}">
            <i class="fas fa-fw fa-file"></i>
            <span>Requested Item</span>
        </a>
    </li>



    <li class="nav-item {{Request::is('technician/my-assigned-work') ? 'bg-info font-weight-bold' : ''}}">
        <a class="nav-link" href="{{route('technician.assignedWork')}}">
            <i class="fas fa-wrench"></i>
            <span>My Assigned Work</span>
            @php
            $count = $workt->count();
            @endphp
           @if ($count > 0)
            <span class="badge bg-danger text-white">{{ $count }}</span>
            @endif</a>

        </a>
    </li>



    <!-- Nav Item - Change Password -->
    <li class="nav-item  {{Request::is('tehcnician/change-password') ? 'bg-info font-weight-bold' : ''}}">
        <a class="nav-link" href="{{route('technician.changePassword')}}">
            <i class="fas fa-fw fa-lock"></i>
            <span>Change Password</span></a>
    </li>






    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>
