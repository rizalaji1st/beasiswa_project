@extends('layouts.pendaftaran')
@section('title', 'pendaftaran')
@section('content')
<section class="hero-banner magic-ball">
    <div class="container">
        <div class="row">
            
        
        <div class="col-lg-3"></div>
        <div class="card shadow col-lg-6">
        <h3 class="card-title mt-3 text-center">Form Pendaftaran Beasiswa {{$adminuniv->nama_penawaran}}</h3>
        <form method="post" action="/">
            @csrf
            <div class="form-group mt-3">
                <label for="id_pendaftar">ID Pendaftar</label>
                <input type="text" name="id_pendaftar" class="form-control" id="id_pendaftar">
                @error('id_pendaftar')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="id_penawaran">ID Penawaran</label>
                <input type="text" name="id_penawaran" value="{{$adminuniv->id_penawaran}}" class="form-control" id="id_penawaran" readonly>
                @error('id_pendaftar')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="nim">NIM</label>
                <input type="text" name="nim" class="form-control" id="nim">
                @error('id_penawaran')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="ipk">IPK</label>
                <input type="text" name="ipk" class="form-control" id="ipk">
                @error('ipk')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="ips">IPS</label>
                <input type="text" name="ips" class="form-control" id="ips">
                @error('ips')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="nim">Penghasilan Orang Tua</label>
                <input type="text" name="penghasilan" class="form-control" id="ips">
                @error('penghasilan')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="nim">Semester</label>
                <input type="text" name="semester" class="form-control" id="ips">
                @error('semester')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="button mt-2 mb-2">Daftar</a>
        </form>
        </div>
        </div>
    </div>
</section>

@endsection