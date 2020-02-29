@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-dashboard', 'active')
@section('content')

    <div class="container">
        <h1>Daftar Beasiswa Aktif</h1>
        {{-- succes --}}
        <div class="mt-2">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
            @endif
        </div>
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
