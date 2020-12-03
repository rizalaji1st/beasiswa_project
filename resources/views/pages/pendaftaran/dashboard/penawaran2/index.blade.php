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
                </div>
                <div class="article-details">
                    @if($beasiswa->is_double = 1)
                    beasiswa ganda<br>
                    @else
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