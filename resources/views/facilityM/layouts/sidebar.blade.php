<ul class="navbar-nav bg-primary sidebar sidebar-dark" id="accordionSidebar" style="font-family: Arial, sans-serif; font-size: 16px;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-cogs"></i>
        </div>
        <div class="sidebar-brand-text mx-3" style="font-size: 24px;">FACILITY MANAGER</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Request::is('manager/dashboard') ? 'bg-info font-weight-bold' : ''}}">
        <a class="nav-link" href="{{route('manager.dashboard')}}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('manager/user/*') ? 'show' : '' }}" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="{{ Request::is('manager/user/*') ? 'true' : 'false' }}" aria-controls="collapseOne">
            <i class="fas fa-users"></i>
            <span>Manage Users</span>
            @php
            $count = $staff->where('status', 0)->count();
            @endphp
           @if ($count > 0)
            <span class="badge bg-danger text-white">{{ $count }}</span>
            @endif
        </a>
        <div id="collapseOne" class="collapse {{ Request::is('manager/user/*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('manager/user/newUser') ? ' bg-info text-white font-weight-bold' : '' }}" href="{{ route('newUser') }}">Request User Access
                    @php
                    $count = $staff->where('status', 0)->count();
                    @endphp
                   @if ($count > 0)
                    <span class="badge bg-danger text-white">{{ $count }}</span>
                    @endif
                </a>
                <a class="collapse-item {{ Request::is('manager/user/viewstaff') ? 'bg-info text-white font-weight-bold' : ''}}" href="{{ route('viewstaff') }}">View Users</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{Request::is('manager/technician') ? 'bg-info font-weight-bold' : ''}}">
        <a class="nav-link" href="{{route('manager.technician')}}">
            <i class="fas fa-wrench"></i>
            <span>Technicians</span>
        </a>
    </li>

    <li class="nav-item {{Request::is('manager/resilience') ? 'bg-info font-weight-bold' : ''}}">
        <a class="nav-link" href="{{route('manager.ViewResilience')}}">
            <i class="fas fa-building"></i>
            <span>Resilience</span>
        </a>
    </li>

    <li class="nav-item {{Request::is('manager/item-request') ? 'bg-info font-weight-bold' : ''}}">
        <a class="nav-link" href="{{route('manager.viewRequestItem')}}">
            <i class="fas fa-building"></i>
            <span>View Request Item</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('manager/work/*') ? 'show' : '' }}" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="{{ Request::is('manager/work/*') ? 'true' : 'false' }}"  aria-controls="collapseTwo">
        <i class="fas fa-tasks"></i>
        <span>Manage Work</span>
        @php
        $count = $workorder->count();
        @endphp
       @if ($count > 0)
        <span class="badge bg-danger text-white">{{ $count }}</span>
        @endif
    </a>
        <div id="collapseTwo"  class="collapse {{ Request::is('manager/work/*') || Request::is('manager/work/view-work-request') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{Request::is('manager/work/view-work-request') ? 'bg-info text-white font-weight-bold' : ''}}" href="{{route('manager.ViewWorkRequest')}}">View Work Requests
                    @php
                    $count = $workorder->count();
                    @endphp
                   @if ($count > 0)
                    <span class="badge bg-danger text-white">{{ $count }}</span>
                    @endif</a>
                <a class="collapse-item {{Request::is('manager/work/view-approved-work') ? 'bg-info text-white font-weight-bold' : ''}}" href="{{route('manager.ViewApprovedWork')}}">View Approved Work</a>
                <a class="collapse-item {{Request::is('manager/work/view-completed') ? 'bg-info text-white font-weight-bold' : ''}}" href="{{route('manager.ViewCompleteWork')}}">View Completed Work</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{Request::is('manager/changepassword') ? 'bg-info font-weight-bold' : ''}}">
        <a class="nav-link" href="{{route('manager.changepassword')}}">
            <i class="fas fa-building"></i>
            <span>change password</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
</ul>
