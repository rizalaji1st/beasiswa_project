<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{url('/')}}">Beasiswa UNS</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{url('/')}}">UNS</a>
    </div>
    <ul class="sidebar-menu">
      <li class="@yield('status-beasiswa')"><a class="nav-link" href="{{url('/')}}"><i class="fas fa-graduation-cap"></i> <span>Beasiswa
            Aktif</span></a>
      </li>

      <li><a class="nav-link" href="credits.html"><i class="fas fa-bullhorn"></i><span>Pengumuman</span></a></li>
    </ul>

    @guest
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="{{route('login')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Masuk
      </a>
    </div>
    @endguest
    @auth
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a class="btn btn-primary btn-lg btn-block btn-icon-split" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
          <i class="fas fa-rocket"></i>
          {{ __('Keluar') }}
        </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </div>
    @endauth
  </aside>
</div>