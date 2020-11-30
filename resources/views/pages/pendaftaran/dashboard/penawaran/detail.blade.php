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
    <!-- DataTales Example -->
    <div class="card text-left">
        <div class="card-header">
            Detail Beasiswa
        </div>
        <div class="card-body">
            <div class="col-lg-6">
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

                <div class="alert alert-danger mt-2" role="alert">
                    <i class="fas fa-fw fa-clipboard-check"></i>
                    Terakhir Pendafataran: {{$Penawaran->tgl_akhir_pendaftaran->format('d M Y')}}
                </div>
                <div class="alert alert-success mb-0" role="alert">
                    <i class="fas fa-fw fa-clipboard-check"></i>
                    Pengumuman: {{$Penawaran->tgl_pengumuman->format('d M Y')}}
                </div>
                <br>
                <form action="">
                    @foreach ($Penawaran->lampiranPendaftar as $lamp)
                    <div class="custom-file mb-3">
                        <input type="file" name="files[]" class="custom-file-input" id="file" required>
                        <label class="custom-file-label" for="file">Upload
                            {{$lamp->refJenisFile->nama_jenis_file}}...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                    @endforeach
                </form>

                <a href="/pendaftar/penawaran/upload/{{$Penawaran->id_penawaran}}" class=" btn
                                btn-primary
                                btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fa fa-paper-plane"></i>
                    </span>
                    <span class="text">Apply Beasiswa</span>
                </a>
            </div>
        </div>
        <div class="card-footer text-muted">
            batas pendaftaran {{$selisih}} hari lagi
        </div>
    </div>
</div>
@endsection