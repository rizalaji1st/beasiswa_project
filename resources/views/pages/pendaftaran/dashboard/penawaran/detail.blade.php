<?php
$sekarang = Carbon\Carbon::now();
$akhir = $Penawaran->tgl_akhir_pendaftaran;
$selisih = $akhir->diffInDays($sekarang);
?>
@extends('layouts.pendaftar')
@section('title', 'Penawaran Beasiswa')
@section('status-dashboard', 'active')
@section('content')
<div class="container-fluid">
    <div class="col-lg-6"></div>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Beasiswa {{$Penawaran->nama_penawaran}}</h1>
    <!-- DataTales Example -->
    <div class="card text-left">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$Penawaran->nama_penawaran}}</h5>
            <p class="card-text">{!!$Penawaran->deskripsi!!}</p>
            <i class="fas fa-fw fa-clipboard-check"></i>
            Kuota: {{$Penawaran->jml_kuota}}
            <br><i class="fas fa-fw fa-clipboard-check"></i>
            Minimal Semester: {{$Penawaran->min_semester}}
            <br>
            <i class="fas fa-fw fa-clipboard-check"></i>
            Maximal Semester: {{$Penawaran->max_semester}}
            <br>
            <i class="fas fa-fw fa-clipboard-check"></i>
            Mulai Pendaftaran: {{$Penawaran->tgl_awal_pendaftaran->format('d M Y')}}
            <br>
            <div class="alert alert-danger col-lg-3 mt-2" role="alert">
                <i class="fas fa-fw fa-clipboard-check"></i>
                Terakhir Pendafataran: {{$Penawaran->tgl_akhir_pendaftaran->format('d M Y')}}
            </div>
            <div class="alert alert-success col-lg-3 mb-0" role="alert">
                <i class="fas fa-fw fa-clipboard-check"></i>
                Pengumuman: {{$Penawaran->tgl_pengumuman->format('d M Y')}}
            </div>
            <br>
            <a id="link" href="" class=" btn
                                btn-primary
                                btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fa fa-paper-plane"></i>
                </span>
                <span class="text">Apply Beasiswa</span>
            </a>
        </div>
        <div class="card-footer text-muted">
            batas pendaftaran {{$selisih}} hari lagi
        </div>
    </div>
</div>
@endsection