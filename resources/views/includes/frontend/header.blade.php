  <!--================ Header Menu Area start =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
              <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Beranda</a></li> 
              <li class="nav-item"><a class="nav-link" href="#daftarBeasiswa">Beasiswa</a></li> 
            </ul>

            @guest
            <div class="nav-right text-center text-lg-right py-4 py-lg-0">
              <a class="button" href="{{url('login')}}">Masuk</a>
            </div>
            @endguest
            @auth
            @can('admin-dashboard')
              <div class="nav-right text-center text-lg-right py-4 py-lg-0">
                <a href="{{route('admin.penawarans.index')}}" class="button">Akun</a>
              </div>
            @endcan
            @can('user-dashboard')
              <div class="nav-right text-center text-lg-right py-4 py-lg-0"> 
                <a href="{{url('pendaftar/penawaran')}}" class="button">Akun</a>  
              </div>
            @endcan
            @endauth
          </div> 
        </div>
      </nav>
    </div>
  </header>