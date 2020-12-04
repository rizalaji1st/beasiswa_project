@extends('layouts.stisla')
@section('title', 'Penawaran Beasiswa')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Selamat Datang!</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Components</a></div>
            <div class="breadcrumb-item">Hero</div>
        </div>
    </div>

    <div class="section-body">
        {{-- ss --}}

        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero bg-primary text-white">
                    <div class="hero-inner">
                        <h2>Hai, {{Auth::user()->name}}</h2>
                        <p class="lead">Selamat datang di sistem informasi beasiswa Universitas Sebelas Maret</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Beasiswa Aktif</h4>
                        </div>
                        <div class="card-body">
                            {{$beasiswas->count()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Beasiswa Anda</h4>
                        </div>
                        <div class="card-body">
                            {{$beasiswa_anda->count()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection