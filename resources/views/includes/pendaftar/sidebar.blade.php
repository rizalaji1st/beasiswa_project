    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.penawarans.index')}}">
          <div class="sidebar-brand-text mx-3">Beasiswa UNS</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Hak akses -->
        <li class="nav-item @yield('status-akses')">
        </li>

        
        <!-- Divider -->
        <hr class="sidebar-divider">
        
        <!-- Heading -->
        <div class="sidebar-heading">
          Menu
        </div>

        <li class="nav-item @yield('status-penawaran')">
          <a class="nav-link" href="/pendaftar/penawaran">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
            <span>Penawaran</span>
          </a>
        </li>

        <li class="nav-item @yield('status-verifikasi')">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-clipboard-check"></i>
            <span>Timeline</span></a>
        </li>

        <li class="nav-item @yield('status-verifikasi')">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-clipboard-check"></i>
            <span>Biodata</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>
      <!-- End of Sidebar -->


