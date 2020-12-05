@extends('layouts.stisla')
@section('title', 'Penawaran Beasiswa')
@section('status-beasiswa', 'active')
@section('content')
<div class="section-header">
    <h1>Daftar beasiswa Aktif</h1>
</div>
<div class="section-body">
    <div class="row">
        @foreach ($beasiswas as $beasiswa)
        @if ($beasiswa->tgl_akhir_penawaran > $time)
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article">
                <div class="article-header">
                    <div class="article-image" data-background="{{url('dashboard/img/bea.jpg')}}"
                        style="background-image: url(&quot;{{url('dashboard/img/bea.jpg')}}&quot;);">
                    </div>
                </div>
                <div class="article-details">
                    Beasiswa {{$beasiswa->nama_penawaran}}<br>
                    <i class="fas fa-box-open mr-1"></i>
                    Tahun: {{$beasiswa->tahun_dasar_akademik}}<br>
                    <i class="fas fa-box-open mr-1"></i>
                    Kuota: {{$beasiswa->jml_kuota}}
                    <div class="article-cta mt-3">
                        <a href="/pendaftar/penawaran/detail/{{$beasiswa->id_penawaran}}" class="btn btn-primary ">Selengkapnya</a>
                    </div>
                </div>
            </article>
        </div>
        @endif
        @endforeach
    </div>
    @endsection