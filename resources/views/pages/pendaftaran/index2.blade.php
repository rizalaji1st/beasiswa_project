<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Index</title>
  @include('mhstemplate.style')

</head>
<body class="bg-shape">

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
              <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li> 
              <li class="nav-item"><a class="nav-link" href="about.html">About</a></li> 
              <li class="nav-item"><a class="nav-link" href="package.html">Packages</a>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Pages</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="amentities.html">Amentities</a>                 
                </ul>
							</li>

              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Blog</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="blog.html">Blog Single</a></li>
                  <li class="nav-item"><a class="nav-link" href="blog-details.html">Blog Details</a></li>
                </ul>
							</li>
              <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
            </ul>

            <div class="nav-right text-center text-lg-right py-4 py-lg-0">
              <a class="button" href="#">Get Started</a>
            </div>
          </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->


  <!--================Hero Banner Area Start =================-->
  <section class="hero-banner magic-ball">
    <div class="container">

      <div class="row align-items-center text-center text-md-left">
        <div class="col-md-6 col-lg-5 mb-5 mb-md-0">
          <h1>Selamat Datang Mahasiswa!</h1>
          <p>"Hambatan tidak bisa menghentikan Anda. Masalah tidak bisa menghentikan Anda. Orang lain tidak bisa menghentikan Anda. Hanya Anda yang bisa menghentikan Anda" – Jeffrey Gitomer</p>
          <a class="button button-hero mt-4" href="#">Get Started</a>
        </div>
        <div class="col-md-6 col-lg-7 col-xl-6 offset-xl-1">
          <img class="img-fluid" src="img/home/hero-img.png" alt="">
        </div>
      </div>
    </div>
  </section>
  <!--================Hero Banner Area End =================-->


  <!--================Service Area Start =================-->
  <section class="section-margin generic-margin">
    <div class="container">
      <div class="section-intro text-center pb-90px">
        <img class="section-intro-img" src="img/home/section-icon.png" alt="">
        <h2>Daftar Beasiswa Aktif</h2>
        <p>Fowl have fruit moveth male they are that place you will lesser</p>
      </div>

      <div class="row">
          @foreach ($beasiswas as $beasiswa)
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="card-blog">
            <img class="card-img rounded-0" src="img/blog/blog-1.png" alt="">
            <div class="card-blog-body">
              <a href="#">
                <h4>{{$beasiswa->nama_penawaran}}</h4>
              </a>
              <ul class="card-blog-info">
                <li><a href="#"><span class="align-middle"><i class="ti-notepad"></i></span>Mulai Pendaftaran :
                            {{$beasiswa->tgl_awal_pendaftaran->format('d M Y')}}</a></li>
                <li><a href="#"><span class="align-middle"><i class="ti-comments-smiley"></i></span>03 Comments</a></li>
              </ul>
              <p>Varius metus morbi ferme libero vehic on porta malesuada ut interdu estmales torquent vehicula parturient </p>
              <button class="button button-success mt-4">Daftar</button>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!--================Blog section End =================-->


  <!-- ================ start footer Area ================= -->
  <footer class="footer-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>About Agency</h6>
            <p>
              The world has become so fast paced that people don’t want to stand by reading a page of information to be  they would much rather look at a presentation and understand
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Navigation Links</h6>
            <div class="row">
              <div class="col">
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Feature</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Portfolio</a></li>
                </ul>
              </div>
              <div class="col">
                <ul>
                  <li><a href="#">Team</a></li>
                  <li><a href="#">Pricing</a></li>
                  <li><a href="#">Blog</a></li>
                  <li><a href="#">Contact</a></li>
                </ul>
              </div>										
            </div>							
          </div>
        </div>							
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Newsletter</h6>
            <p>
              For business professionals caught between high OEM price and mediocre print and graphic output.									
            </p>								
            <div id="mc_embed_signup">
              <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscription relative">
                <div class="input-group d-flex flex-row">
                  <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                  <button class="btn bb-btn"><span class="lnr lnr-location"></span></button>		
                </div>									
                <div class="mt-10 info"></div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget mail-chimp">
            <h6 class="mb-20">InstaFeed</h6>
            <ul class="instafeed d-flex flex-wrap">
              <li><img src="img/instagram/i1.jpg" alt=""></li>
              <li><img src="img/instagram/i2.jpg" alt=""></li>
              <li><img src="img/instagram/i3.jpg" alt=""></li>
              <li><img src="img/instagram/i4.jpg" alt=""></li>
              <li><img src="img/instagram/i5.jpg" alt=""></li>
              <li><img src="img/instagram/i6.jpg" alt=""></li>
              <li><img src="img/instagram/i7.jpg" alt=""></li>
              <li><img src="img/instagram/i8.jpg" alt=""></li>
            </ul>
          </div>
        </div>						
      </div>

      <div class="footer-bottom">
        <div class="row align-items-center">
          <p class="col-lg-8 col-sm-12 footer-text m-0 text-center text-lg-left"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          <div class="col-lg-4 col-sm-12 footer-social text-center text-lg-right">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-dribbble"></i></a>
            <a href="#"><i class="fab fa-behance"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- ================ End footer Area ================= -->




  @include('mhstemplate.script')
</body>
</html>