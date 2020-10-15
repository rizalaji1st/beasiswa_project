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

         {{-- Penetapan --}}
      <li class="nav-item dropdown ">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{url('/adminuniversitas')}}" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-gavel"></i>Penetapan</a>
    <div class="dropdown-menu">
    <h6>
      <li class="nav-item"><a class="dropdown-item" href="{{ url ('/nrangkings') }}">Nominasi Rangking</a>
      <a class="dropdown-item" href="{{ url ('/pnominasis') }}">Penetapan Lolos</a>
      <!-- <a class="dropdown-item" href="{{ url ('/pengusulans') }}">Pengusulan Nominasi</a> -->




        </h6>
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


