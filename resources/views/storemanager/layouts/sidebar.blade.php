<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">STORE MANAGER</div>
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


 <!-- Nav Item - Requested Item -->
 <li class="nav-item {{Request::is('store-manager/items') ? 'bg-info font-weight-bold' : ''}}"">
    <a class="nav-link" href="{{route('storeM.viewItem')}}">
        <i class="fas fa-fw fa-file"></i>
        <span>Items</span>
    </a>
</li>


<!-- Nav Item - Requested Item -->
<li class="nav-item {{Request::is('store-manager/view-approved-item') ? 'bg-info font-weight-bold' : ''}}">
    <a class="nav-link" href="{{route('storeM.viewaAppovedItem')}}">
        <i class="fas fa-fw fa-file"></i>
        <span>Approved Request Item</span>
    </a>
</li>




    <li class="nav-item">
        <a class="nav-link" href="{{route('storeM.changepassword')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Change Password</span></a>
    </li>





    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>
