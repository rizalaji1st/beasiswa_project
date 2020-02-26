    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-text mx-3">Admin Universitas</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item @yield('status-dashboard')">
          <a class="nav-link" href="{{url('/adminuniversitas')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        {{-- verifikasi --}}
        <li class="nav-item @yield('status-verifikasi')">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-clipboard-check"></i>
            <span>Verifikasi</span></a>
        </li>

        {{-- penetapan --}}
        <li class="nav-item @yield('status-penetapan')">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-gavel"></i>
            <span>Penetapan</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>
      <!-- End of Sidebar -->
