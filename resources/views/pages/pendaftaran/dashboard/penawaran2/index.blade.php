@extends('layouts.stisla')
@section('title', 'Penawaran Beasiswa')
@section('content')
<div class="section-header">
    <h1>Daftar beasiswa Aktif</h1>
</div>
<div class="section-body">
    <div class="row">
        @foreach ($beasiswas as $beasiswa)
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article">
                <div class="article-header">
                    <div class="article-image" data-background="{{url('dashboard/img/bea.jpg')}}"
                        style="background-image: url(&quot;{{url('dashboard/img/bea.jpg')}}&quot;);">
                    </div>
                    @if($user->count() > 0)
                    <div class="article-badge">
                        <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> Trending</div>
                    </div>
                    @else
                    @endif
                </div>
                <div class="article-details">
                    @if($beasiswa->is_double != 1)
                    <div class="alert alert-danger">
                        beasiswa tidak bisa didaftar dengan beasiswa lain
                    </div>
                    @else($beasiswa->is_double = 0)
                    beasiswa tunggal<br>
                    @endif
                    Beasiswa {{$beasiswa->nama_penawaran}}<br>
                    <i class="fas fa-box-open"></i>
                    Tahun Akademik: {{$beasiswa->tahun_dasar_akademik}}<br>
                    <i class="fas fa-box-open"></i>
                    Kuota: {{$beasiswa->jml_kuota}}

                    <div class="article-cta">
                        <a href="/pendaftar/penawaran/detail/{{$beasiswa->id_penawaran}}" class="btn btn-primary">Read
                            More</a>
                    </div>
                </div>
            </article>
        </div>
        @endforeach


    </div>
    @endsection