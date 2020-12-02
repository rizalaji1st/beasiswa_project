@extends('layouts.stisla')
@section('title', 'Penawaran Beasiswa')
@section('content')
<div class="section-header">
    <h1>Pemberkasan</h1>
</div>
<h2 class="section-title">Upload File</h2>
<div class="col-lg-6">
    @foreach ($Penawaran->lampiranPendaftar as $lamp)
    <div class="form-group">
        <form method="post" action="{{ route('pendaftar_upload', $Penawaran->id_penawaran)}}"
            enctype="multipart/form-data">
            <label>{{$lamp->refJenisFile->nama_jenis_file}}</label>
            <input type="file" class="form-control">
            @endforeach
            @if($user==null)
            <button type="submit" class="btn btn-icon icon-left btn-primary mt-2"><i class="fa fa-paper-plane"></i>Apply
                Beasiswa</button>
            @else
            <button type="submit" class="btn btn-icon icon-left btn-danger mt-2" disabled>
                <i class="fas fa-exclamation"></i>
                Anda Sudah Mendaftar
            </button>
            <br>
            <a href="/pendaftar/penawaran/print/{{$Penawaran->id_penawaran}}" type="submit"
                class="btn btn-icon icon-left btn-primary mt-2">
                <i class="fas fa-print">Print Bukti Pendaftaran</i>
            </a>

            @endif
        </form>
    </div>


</div>

@endsection