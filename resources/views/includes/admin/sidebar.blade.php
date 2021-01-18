<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{url('/')}}">Beasiswa UNS</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{url('/')}}">UNS</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Menu Utama</li>
      {{-- beranda --}}
      <li class="@yield('status-beasiswa')">
        <a class="nav-link" href="{{url('/')}}">
          <i
            class="fas fa-graduation-cap"></i><span>Beasiswa Aktif</span>
        </a>
      </li>
      @can('manage-users')
      <li>
        <a class="nav-link" href="{{url('/pendaftar/pengumuman')}}"><i
        class="fas fa-bullhorn"></i><span>Pengumuman</span></a>
      </li>
      <!-- Nav Item - Hak akses -->
      <li class="nav-item dropdown @yield('status-akses')">
        <a href="{{url('/users')}}" class="nav-link has-dropdown">
          <i class="fas fa-shield-alt"></i>
          <span>Daftar Hak Akses</span></a>
        <ul class="dropdown-menu">
          @can('manage-users')
          <li>
            <a class="nav-link @yield('status-akses')" href="{{route('admin.users.index')}}"><i class="fa fa-users" aria-hidden="true"></i>  Manage Users</a>
          </li>
          @endcan
          @can('edit-users')
          <li>
            <a  class="nav-link" href="">Super User <i class="fa fa-check-circle text-success" aria-hidden="true"></i></a>
          </li>
          @endcan
          @can('adminuniversitas-users')
          <li>
            <a class="nav-link" href="">Admin Universitas <i class="fa fa-check-circle text-success" aria-hidden="true"></i></a>
          </li>
          @endcan
          @can('adminfakultas-users')
          <li>
            <a class="nav-link" href="">Admin Fakultas <i class="fa fa-check-circle text-success" aria-hidden="true"></i></a>
          </li>
          @endcan
          <li>
            <a class="nav-link" href="">General Users <i class="fa fa-check-circle text-success" aria-hidden="true"></i></a>
          </li>
        </ul>
      </li>
      @endcan
      @can('adminuniversitas-users')
      <li class="menu-header">Admin Universitas</li>
    <!-- Nav Item - Penawaran -->
    <li class="nav-item @yield('status-penawaran')">
      <a class="nav-link" href="{{route('admin.penawarans.index')}}">
        <i class="fas fa-graduation-cap" aria-hidden="true"></i>
        <span>Penawaran</span>
      </a>
    </li>
    <!-- Nav Item - Verifikasi -->
    <li class="nav-item @yield('status-verifikasi')">
      <a class="nav-link" href="{{route('admin.verifikasi.index')}}">
        <i class="fas fa-signature    "></i>
        <span>Verifikasi</span>
      </a>
    </li>

    <li class="nav-item dropdown @yield('status-penetapan')">
      <a class="nav-link nav-link has-dropdown" href="#">
        <i class="fas fa-hammer"></i>
        <span>Monitoring</span>
      </a>
      <ul class="dropdown-menu">
        <li>
          <a class="nav-link @yield('status-penetapan')" href="{{route('admin.nominasi.index')}}">Nominasi Rangking</a>
        </li>
        <li>
          <a class="nav-link @yield('status-penetapan')" href="{{ url ('/pnominasis') }}">Penetapan Lolos</a>
        </li>
        <li>
          <a class="nav-link @yield('status-penetapan')" href="{{ url ('/pengusulan') }}">Pengusulan Nominasi</a>
        </li>
      </ul>
    </li>
    <!-- Nav Item - Lampiran -->
    <li class="nav-item @yield('status-lampiran')">
      <a class="nav-link" href="{{route('admin.lampiran-penawaran.index')}}">
        <i class="fas fa-paperclip    "></i>
        <span>Lampiran</span>
      </a>
    </li>
    @endcan
    @guest
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="{{route('login')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-sign-in-alt    "></i> Masuk
      </a>
    </div>
    @endguest
    @auth
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a class="btn btn-primary btn-lg btn-block btn-icon-split" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt    "></i>
        {{ __('Keluar') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </div>
    @endauth
      {{-- end of user sidebar--}}
    </ul>
    
    
  </aside>
</div>
<!-- End of Sidebar -->