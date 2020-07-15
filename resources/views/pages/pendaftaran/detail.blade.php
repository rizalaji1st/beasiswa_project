@extends('layouts.pendaftaran')
@section('title', 'Detail Beasiswa')
@section('content')
<section class="hero-banner magic-ball">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-lg-8 mb-4 mb-lg-0">
          <div class="card-blog">
            <div class="card-blog-body">
                <h4>BEASISWA {{$adminuniv->nama_penawaran}}</h4>
              </a>
              <ul class="card-blog-success">
                <li><a><span class="align-middle"><i class="ti-calendar"></i></span> Mulai Pendaftaran:  {{$adminuniv->tgl_awal_pendaftaran->format('d M Y')}}</a></li>
                
                <li><a><span class="align-middle"><i class="ti-calendar"></i></span> Batas Akhir Pendaftaran:  {{$adminuniv->tgl_akhir_pendaftaran->format('d M Y')}}</a></li>
                <li><a><span class="align-middle"><i class="ti-calendar"></i></span> Tanggal Pengumuman:  {{$adminuniv->tgl_pengumuman->format('d M Y')}}</a></li>
                <li><a><span class="align-middle"><i class="ti-calendar"></i></span> IPK Minimal:  {{$adminuniv->ipk}}</a></li>
                <li><a><span class="align-middle"><i class="ti-calendar"></i></span> Minimal Semester:  {{$adminuniv->min_semester}}</a></li>
                <li><a><span class="align-middle"><i class="ti-calendar"></i></span> Maksimal Semester:  {{$adminuniv->max_semester}}</a></li>
                <li><a><span class="align-middle"><i class="ti-package"></i></span> Kuota : {{$adminuniv->jml_kuota}} Penerima</a></li>
                <li><a><span class="align-middle"><i class="ti-package"></i></span> Penghasilan Orang Tua : {{$adminuniv->Penghasilan}}</a></li>
              </ul>
              <a href="/daftar/{{$adminuniv->id_penawaran}}" class="button button-success mt-4">Selengkapnya</a>
            </div>
          </div>
        </div>
        </div> 
    </div>
</section>

@endsection