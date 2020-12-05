@extends('layouts.stisla')
@section('title', 'Penawaran Beasiswa')
@section('status-beasiswa', 'active')
@section('content')
<div class="section-header">
    <h1>Pemberkasan</h1>
</div>
@include('includes.flashmessage')
<h2 class="section-title">Upload File</h2>
<div class="col-lg-6">
    
    <div class="form-group">
        <form method="post" action="{{ route('pendaftar_upload', $Penawaran->id_penawaran)}}"
            enctype="multipart/form-data">
            @csrf
            @if ($Penawaran->tgl_akhir_pendaftaran > $time)
                @if($user->count() <= 0 && $cek->count() <= 0)
                    @foreach ($Penawaran->lampiranPendaftar as $lamp)
                        <label>{{$lamp->refJenisFile->nama_jenis_file}}</label>
                        <input type="file" class="form-control" name="nama{{$lamp->id_upload_file}}">
                    @endforeach
                        <button type="submit" class="btn btn-icon icon-left btn-primary mt-2"><i class="fa fa-paper-plane"></i>Apply
                            Beasiswa</button>
                    @else
                    <button type="submit" class="btn btn-icon icon-left btn-success mt-2" disabled>
                        <i class="fas fa-exclamation"></i>
                        Anda Sudah Mendaftar
                    </button>
                    <br>
                    <a href="/pendaftar/penawaran/print/{{$Penawaran->id_penawaran}}" type="submit"
                        class="btn btn-icon icon-left btn-primary mt-2" target="_blank">
                        <i class="fas fa-print">Print Bukti Pendaftaran</i>
                    </a>
                @endif
            @else
            <div class="alert alert-danger alert-has-icon">
                <div class="alert-icon"><i class="fa fa-check"></i></div>
                <div class="alert-body">
                    <div class="alert-title"></div>
                    Waktu Pendaftaran telah berlalu
                </div>
            </div>
            @endif
            
        </form>
    </div>


</div>

@endsection