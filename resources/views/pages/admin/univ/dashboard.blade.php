@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-dashboard', 'active')
@section('content')

    <div class="container">
        <h1>Daftar Beasiswa Aktif</h1>
        <a href="{{url('/adminuniversitas/create')}}" class="btn btn-primary mt-4 mb-2">Tambahkan Penawaran</a>
        @foreach ($beasiswas as $beasiswa)
        <ul class="list-group mt-2">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$beasiswa->nama_penawaran}}
                <a href="/adminuniversitas/{{$beasiswa->id_penawaran}}" class="badge badge-info badge-pill">detail</a>
            </li>
        </ul>
        @endforeach
    </div>

@endsection
