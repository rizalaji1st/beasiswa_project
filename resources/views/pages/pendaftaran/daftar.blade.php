@extends('layouts.pendaftaran')
@section('title', 'pendaftaran')
@section('content')
<section class="hero-banner magic-ball">
    <div class="container">
        <div class="row">
            
        
        <div class="col-lg-3"></div>
        <div class="card shadow col-lg-6">
        <h3 class="card-title mt-3 text-center">Form Pendaftaran Beasiswa {{$adminuniv->nama_penawaran}}</h3>
        <form>
            <div class="form-group mt-3">
                <label for="nim">ID Pendaftar</label>
                <input type="text" name="nim" class="form-control" id="nim" readonly>
            </div>
            <div class="form-group mt-3">
                <label for="nim">ID Penawaran</label>
                <input type="text" name="nim" value="{{$adminuniv->id_penawaran}}" class="form-control" id="nim" readonly>
            </div>
            <div class="form-group mt-3">
                <label for="nim">NIM</label>
                <input type="text" name="nim" class="form-control" id="nim">
            </div>
            <div class="form-group mt-3">
                <label for="nim">IPK</label>
                <input type="text" name="nim" class="form-control" id="nim">
            </div>
            <div class="form-group mt-3">
                <label for="nim">IPS</label>
                <input type="text" name="nim" class="form-control" id="nim">
            </div>
            <div class="form-group mt-3">
                <label for="nim">Penghasilan Orang Tua</label>
                <input type="text" name="nim" class="form-control" id="nim">
            </div>
            <div class="form-group mt-3">
                <label for="nim">Semester</label>
                <input type="text" name="nim" class="form-control" id="nim">
            </div>
        </form>
        </div>
        </div>
    </div>
</section>

@endsection