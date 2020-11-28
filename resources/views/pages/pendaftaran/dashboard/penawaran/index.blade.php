@extends('layouts.pendaftar')
@section('title', 'Penawaran Beasiswa')
@section('status-dashboard', 'active')
@section('content')
<div class="container-fluid">
    <div class="col-lg-6"></div>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Beasiswa</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Beasiswa</h6>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($beasiswas as $beasiswa)
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Beasiswa {{$beasiswa->nama_penawaran}}</h5>
                            <p class="card-text">{!!$beasiswa->deskripsi!!}</p>
                            <a href="/pendaftar/penawaran/detail/{{$beasiswa->id_penawaran}}"
                                class="btn btn-primary">selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection