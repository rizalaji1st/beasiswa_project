    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/adminuniversitas">
          <div class="sidebar-brand-text mx-3">Admin Universitas</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Penawaran -->
        <li class="nav-item @yield('status-dashboard')">
          <a class="nav-link" href="{{url('/adminuniversitas')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Penawaran</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        {{-- verifikasi --}}
        <li class="nav-item @yield('status-verifikasi')">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-clipboard-check"></i>
            <span>Verifikasi</span></a>
        </li>

        

         <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-gavel"></i>
          <span>Monitoring</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{url('/dashboard')}}">
              <i class="nav-icon far fa-eye"></i>
                Data Mahasiswa
            </a>
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{url('/hasil_mhs')}}">
            <i class="nav-icon fas fa-th-list"></i>
                Hasil_ex
            </a>
         
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{url('/dashboard_hasil')}}">
            <i class="nav-icon fas fa-th-list"></i>
                Hasil
            </a>
      </li>



        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>
      <!-- End of Sidebar -->


