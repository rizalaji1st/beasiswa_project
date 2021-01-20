@extends('layouts.adminuniv')
@section('title', 'Penawaran Beasiswa')
@section('status-beasiswa', 'active')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Beasiswa {{$Penawaran->nama_penawaran}}</h3>
    </div>
    <div class="card-body">
        @if($user->count() > 0 && $cek->count() > 0)
        <div class="alert alert-success alert-has-icon">
            <div class="alert-icon"><i class="fa fa-check"></i></div>
            <div class="alert-body">
                <div class="alert-title"></div>
                Anda sudah mendaftar beasiswa ini
            </div>
        </div>
        @endif
    </div>


    <div class="container">
        <h4>Deskripsi</h4>
    <div class="container">
        <p class="mb-2">{!!$Penawaran->deskripsi!!}</p>
        <table class="table table-borderles">
            <tr class="d-flex">
                <td scope="col" col="col-3"><i class="fas fa-box-open mr-2"></i>Kuota:</td>
                <td scope="col" col="col-1">:</td>
                <td scope="col" col="col">{{$Penawaran->jml_kuota}} Penerima</td>
            </tr>
        </table>
    </div>
    <h4 class="mt-2">Persyaratan</h4>
    <div class="container">
        <p>
            <i class="fas fa-chevron-down mr-2"></i>
            <span>Minimal Semester: {{$Penawaran->min_semester}}</span>
        </p>
        <p>
            <i class="fas fa-chevron-up mr-2"></i>
            <span> Maksimal Semester: {{$Penawaran->max_semester}} </span>
        </p>
        <p>
            <i class="fas fa-chevron-down mr-2"></i>
            <span>Indek Prestasi Komulatif: {{$Penawaran->ipk}}</span>
        </p>
        <p>
            <i class="fas fa-chevron-up mr-2"></i>
            <span> Index Prestasi Semester: {{$Penawaran->ips}} </span>
        </p>
        <p>
            <i class="fas fa-chevron-up mr-2"></i>
            <span> Maksimal penghasilan: Rp. {{$Penawaran->max_penghasilan}} </span>
        </p>
    </div>
    <h4 class="mt-4">Timeline</h4>
    <div class="container">
        <p>
            <i class="fas fa-hourglass-start mr-2"></i>
            <span> Mulai Pendaftaran: {{$Penawaran->tgl_awal_pendaftaran->format('d M Y')}} </span>
        </p>
        <p>
            <i class="fas fa-fw fa-clipboard-check mr-2"></i>
            <span> Terakhir Pendafataran: {{$Penawaran->tgl_akhir_pendaftaran->format('d M Y')}} </span>
        </p>
        <p>
            <i class="fas fa-fw fa-clipboard-check mr-2"></i>
            <span> Pengumuman: {{$Penawaran->tgl_pengumuman->format('d M Y')}} </span>
        </p>
    </div>
    <h4 class="mt-4">Berkas yang perlu di siapkan </h4>
    <div class="container">
        @forelse ($Penawaran->lampiranPendaftar as $lamp)
        <ul class="list-group my-2">
            <li class="list-group-item">{{$lamp->refJenisFile->nama_jenis_file}}</li>
        </ul>
        @empty
        <h5 style="color: #bdbdbd">*Data Tidak Tersedia</h5>
        @endforelse
    </div>
    <h4 class="mt-4">Lampiran </h4>
    <div class="container">
        @forelse ($Penawaran->penawaranUpload as $lampiran)
        <table class="table table-borderles">
            <tbody>
                <tr class="d-flex">
                    <td scope="col" class="col">
                        <a href="{{Storage::url($lampiran->path_file)}}"><i class="fas fa-file-download mr-2"></i>
                            {{$lampiran->nama_upload}}</a>
                    </td>
                </tr>
            </tbody>
        </table>
        @empty
        <h5>Data tidak tersedia</h5>
        @endforelse
    </div>
    </div>
    <br>
    <div class="container">
        <div class="col text-center">
            <a href="/pendaftar/penawaran/upload/{{$Penawaran->id_penawaran}}"
                class="btn btn-icon icon-left btn-primary mb-4 col-4 text-center"><i class="fas fa-book"></i>Pemberkasan</a>
        </div>
    </div>
</div>


</div>
@endsection