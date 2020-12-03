@extends('layouts.stisla')
@section('title', 'Penawaran Beasiswa')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Beasiswa {{$Penawaran->nama_penawaran}}</h4>
    </div>
    <div class="card-body">
        <p>{{$Penawaran->deskripsi}}</p>
        <i class="fas fa-box-open"></i>
        Kuota: {{$Penawaran->jml_kuota}}
        <br><i class="fas fa-chevron-down"></i>
        Minimal Semester: {{$Penawaran->min_semester}}
        <br>
        <i class="fas fa-chevron-up"></i>
        Maximal Semester: {{$Penawaran->max_semester}}
        <br>
        <i class="fas fa-hourglass-start"></i>
        Mulai Pendaftaran: {{$Penawaran->tgl_awal_pendaftaran->format('d M Y')}}

        <br>
        <i class="fas fa-hourglass-start"></i>
        Berkas yang perlu di siapkan
        <br>
        <div class="col-lg-3">
            @foreach ($Penawaran->lampiranPendaftar as $lamp)
            <ul class="list-group">
                <li class="list-group-item">{{$lamp->refJenisFile->nama_jenis_file}}</li>
            </ul>
            @endforeach
        </div>
        <br>
        <div class="alert alert-danger mt-2" role="alert">
            <i class="fas fa-fw fa-clipboard-check"></i>
            Terakhir Pendafataran: {{$Penawaran->tgl_akhir_pendaftaran->format('d M Y')}}
        </div>
        <div class="alert alert-success mb-0" role="alert">
            <i class="fas fa-fw fa-clipboard-check"></i>
            Pengumuman: {{$Penawaran->tgl_pengumuman->format('d M Y')}}
        </div>
        <a href="/pendaftar/penawaran/upload/{{$Penawaran->id_penawaran}}"
            class="btn btn-icon icon-left btn-primary mt-2"><i class="fas fa-book"></i>Pemberkasan</a>
    </div>

    <div class="card-footer bg-whitesmoke">
        This is card footer
    </div>
</div>
@endsection