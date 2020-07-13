@extends('layouts.frontend')
@section('title', 'Beasiswa UNS')
@section('content')
      <!--================Hero Banner Area Start =================-->
  <section class="hero-banner magic-ball">
    <div class="container">

      <div class="row align-items-center text-center text-md-left">
        <div class="col-md-6 col-lg-5 mb-5 mb-md-0">
          <h1>Selamat Datang Mahasiswa!</h1>
          <p>”Engkau berpikir tentang dirimu sebagai seonggok materi semata, padahal di dalam dirimu tersimpan kekuatan tak terbatas”</p>
          <p>Ali bin Abi-Thalib</p>
          <a class="button button-hero mt-4" href="#">Get Started</a>
        </div>
        <div class="col-md-6 col-lg-7 col-xl-6 offset-xl-1">
        <img class="img-fluid" src="{{'frontend/img/home/exam.svg'}}" alt="">
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
        <p>Manfaatkan peluang emas untuk berprestasi dengan beasiswa</p>
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
                <li><a href="#"><span class="align-middle"><i class="ti-notepad"></i></span>Mulai Pendaftaran:  {{$beasiswa->tgl_awal_pendaftaran->format('d M Y')}}</a></li>
                <li><a href="#"><span class="align-middle"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>Kuota : {{$beasiswa->jml_kuota}} Penerima</a></li>
              </ul>
            <div class="module">
              <p>{{$beasiswa->deskripsi}}</p>
            </div>
              <button class="button button-success mt-4">Selengkapnya</button>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!--================Blog section End =================-->
@endsection