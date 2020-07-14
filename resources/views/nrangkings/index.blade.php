
@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-dashboard', 'active')
@section('content')


@section('title', 'Daftar Mahasiswa')

@section('content') 
    <div class="container">
        <div class="row">
            <div class="col-6"> 
                 <h1 class="mt-2">Daftar Nominasi Rangking</h1>

                 <a href="/nrangkings/create" class="btn btn-primary my-3"> Tambah Data Nominasi Rangking </a>



                 @if(session('status'))
                 <div class="alert-success">
                    {{ session('status') }}
                 </div>
                 @endif


                 <ul class="list-group">
                    @foreach( $nrangkings as $nrangking )
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $nrangking->nama }}
                   <a href="/nrangkings/{{ $nrangking->id }}" class="badge badge-info">detail</a>
                  </li>
                  @endforeach
                </ul>
             
            </div>
        </div>
    </div>

@endsection
