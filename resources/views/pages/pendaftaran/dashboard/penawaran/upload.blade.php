@extends('layouts.pendaftar')
@section('title', 'Penawaran Beasiswa')
@section('status-dashboard', 'active')
@section('content')
<div class="container-fluid">
    @include('includes.flashmessage')
    <div class="col-lg-6"></div>
    <!-- DataTales Example -->
    <div class="card text-left">

        <div class="card-header">
            Detail Beasiswa
        </div>
        <div class="card-body">
            <div class="col-lg-6">
                <h5 class="card-title">Form Upload Berkas</h5>
                <form method="post" action="{{ route('pendaftar_upload', $Penawaran->id_penawaran)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @foreach ($Penawaran->lampiranPendaftar as $lamp)
                    <div class="custom-file mb-3">
                        <input type="file" name="files[]" class="custom-file-input" id="file" required>
                        <label class="custom-file-label" for="file">Upload
                            {{$lamp->refJenisFile->nama_jenis_file}}...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                    @endforeach
                    @if($user==null)
                    <button type="submit" class="btn btn-success btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fa fa-paper-plane"></i>
                        </span>
                        <span class="text">Apply Beasiswa</span>
                    </button>
                    @else
                    <button type="submit" class="btn btn-secondary btn-icon-split btn-sm" disabled>
                        <span class="icon text-white-50">
                            <i class="fa fa-paper-plane"></i>
                        </span>
                        <span class="text">Anda Sudah Mendaftar</span>
                    </button>
                    @endif


                </form>
            </div>
        </div>
        <div class="card-footer text-muted">
            feature
        </div>
    </div>
</div>
@endsection