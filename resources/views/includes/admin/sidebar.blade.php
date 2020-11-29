<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.penawarans.index')}}">
    <div class="sidebar-brand-text mx-3">Admin Beasiswa</sup></div>
  </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Beranda -->
        <li class="nav-item">
          <a class="nav-link" href="{{url('/')}}">
            <i class="fas fa-home    "></i>
            <span>Beranda</span>
          </a>
        </li>
        <!-- Nav Item - Hak akses -->
        <li class="nav-item @yield('status-akses')">
          <a class="nav-link" href="{{url('/users')}}" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-shield-alt"></i>
            <span>Daftar Hak Akses</span>
          </a>
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              @can('manage-users')
                <a class="collapse-item" href="{{route('admin.users.index')}}"><i class="fa fa-users" aria-hidden="true"></i>  Manage Users</a>
              @endcan
              <h6 class="collapse-header">Status:</h6>
              @can('edit-users')
                <div class="collapse-item" href="">Super User <span class="badge badge-primary">Aktif</span></div>
              @endcan
              @can('adminuniversitas-users')
                <div class="collapse-item" href="">Admin Universitas <span class="badge badge-primary">Aktif</span></div>
              @endcan
              @can('adminfakultas-users')
                <div class="collapse-item" href="">Admin Fakultas <span class="badge badge-primary">Aktif</span></div>
              @endcan
                <div class="collapse-item" href="">General Users <span class="badge badge-primary">Aktif</span></div>

      </div>
    </div>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Admin Universitas
  </div>

  <!-- Nav Item - Penawaran -->
  <li class="nav-item @yield('status-penawaran')">
    <a class="nav-link" href="{{route('admin.penawarans.index')}}">
      <i class="fa fa-list-alt" aria-hidden="true"></i>
      <span>Penawaran</span>
    </a>
  </li>

  {{-- verifikasi --}}
  <li class="nav-item @yield('status-verifikasi')">
    <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-clipboard-check"></i>
      <span>Verifikasi</span></a>
  </li>
  <li class="nav-item @yield('status-penetapan')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-hammer    "></i>
      <span>Monitoring</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Menu:</h6>
        <a class="collapse-item" href="{{route('admin.nominasi.index')}}">Nominasi Rangking</a>
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