@extends('layouts.stisla')
@section('title', 'Penawaran Beasiswa')
@section('content')
<div class="section-header">
    <h1>Penawaran</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="section-title mt-0">Daftar Beasiswa Aktif</div>
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group">
                            <label>Pilih Besiswa</label>
                            <select class="form-control" name="bea" id="bea">
                                @foreach ($beasiswas as $beasiswa)
                                <option value=" {{$beasiswa->id_penawaran}}" id="{{$beasiswa->id_penawaran}}">
                                    {{$beasiswa->nama_penawaran}}</option>
                                @endforeach
                            </select>
                            <a id="link" href="" class="btn btn-sm btn-primary mt-2">
                                <span class="text">Detail Beasiswa</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection