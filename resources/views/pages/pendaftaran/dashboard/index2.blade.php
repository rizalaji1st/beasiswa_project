@extends('layouts.stisla')
@section('title', 'Penawaran Beasiswa')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Hero</h1>
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
    </div>
</section>
@endsection