@extends('layouts.pendaftar')
@section('title', 'Penawaran Beasiswa')
@section('status-penawaran', 'active')
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
            <form method="POST" action="">
                @csrf
                <div class="form-group">
                    <label for="bea">Pilih Beasiswa</label>
                    <select class="form-control" name="bea" id="bea">
                        @foreach ($beasiswas as $beasiswa)
                        <option value=" {{$beasiswa->id_penawaran}}" id="{{$beasiswa->id_penawaran}}">
                            {{$beasiswa->nama_penawaran}}</option>
                        @endforeach
                    </select>
                </div>
                <a id="link" href="" class=" btn
                    btn-primary
                    btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fa fa-paper-plane"></i>
                    </span>
                    <span class="text">Apply Beasiswa</span>
                </a>
            </form>
        </div>
    </div>
</div>
@endsection