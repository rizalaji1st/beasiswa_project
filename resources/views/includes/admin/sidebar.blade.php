    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/adminuniversitas">
          <div class="sidebar-brand-text mx-3">Admin Beasiswa</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Hak akses -->
        <li class="nav-item @yield('status-akses')">
          <a class="nav-link" href="{{route('admin.users.index')}}">
            <i class="fas fa-shield-alt    "></i>
            <span>Daftar Hak Akses</span></a>
        </li>

        
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Admin Universitas
        </div>

        <!-- Nav Item - Penawaran -->
        <li class="nav-item @yield('status-penawaran')">
          <a class="nav-link" href="{{url('/adminunivs')}}">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
            <span>Penawaran</span></a>
        </li>

        {{-- verifikasi --}}
        <li class="nav-item @yield('status-verifikasi')">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-clipboard-check"></i>
            <span>Verifikasi</span></a>
        </li>
        <li class="nav-item @yield('status-penetapan')">
          <a class="nav-link collapsed" href="{{url('/adminunivs')}}" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-hammer    "></i>
            <span>Penetapan</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Menu Penetapan:</h6>
              <a class="collapse-item" href="{{ url ('/nrangkings') }}">Nominasi Rangking</a>
              <a class="collapse-item" href="{{ url ('/pnominasis') }}">Penetapan Lolos</a>
              <!-- <a class="dropdown-item" href="{{ url ('/pengusulans') }}">Pengusulan Nominasi</a> -->
            </div>
          </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>
      <!-- End of Sidebar -->


