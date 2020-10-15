@extends('layouts.adminuniv')
@section('title', 'Detail Beasiswa')
@section('status-dashboard', 'active')
@section('content')
    <div class="container my-3">
        {{-- succes --}}
        <div class="mt-2">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
            @endif
        </div>
        <h3 class="mt-2 mb-2">Informasi Umum</h3>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td scope="col">Nama Penawaran</td>
                            <td scope="col">{{$adminuniv->nama_penawaran}}</td>
                        </tr>
                        <tr>
                            <td scope="col">Jenis Beasiswa</td>
                            <td scope="col">{{$adminuniv->refJenisPenawaran->nama_beasiswa}}</td>
                        </tr>
                        <tr>
                            <td scope="col">Tahun</td>
                            <td scope="col">{{$adminuniv->tahun->format('Y')}}</td>
                        </tr>
                        <tr>
                            <td scope="col">Kuota</td>
                            <td scope="col">{{$adminuniv->jml_kuota}} Penerima</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
            <h3 class="mt-2 mb-2">Detail Kuota</h3>
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            @forelse ($fakultas as $item)
                            <tr>
                                <td scope="col">{{$item->refFakultas->nama_fakultas}}</td>
                                <td scope="col">{{$item->jml_kuota}}</td>
                            </tr>
                            @empty
                                <h5 style="color: #bdbdbd">*Data Tidak Tersedia</h5>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        
        <h3 class="mt-4 mb-2">Timeline</h3>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td scope="col">Tanggal Penawaran</td>
                            <td scope="col">{{$adminuniv->tgl_awal_penawaran->format('d M Y')}}
                            s/d {{$adminuniv->tgl_akhir_penawaran->format('d M Y')}}</td>
                        </tr>
                        <tr>
                            <td scope="col">Tanggal Pendaftaran</td>
                            <td scope="col">{{$adminuniv->tgl_awal_pendaftaran->format('d M Y')}}
                                s/d {{$adminuniv->tgl_akhir_pendaftaran->format('d M Y')}}</td>
                        </tr>
                        <tr>
                            <td scope="col">Tanggal Verifikasi</td>
                            <td scope="col">{{$adminuniv->tgl_awal_verifikasi->format('d M Y')}}
                                s/d {{$adminuniv->tgl_akhir_verifikasi->format('d M Y')}}</td>
                        </tr>
                        <tr>
                            <td scope="col">Tanggal Penetapan</td>
                            <td scope="col">{{$adminuniv->tgl_awal_penetapan->format('d M Y')}}
                                s/d {{$adminuniv->tgl_akhir_penetapan->format('d M Y')}}</td>
                        </tr>
                        <tr>
                            <td scope="col">Tanggal Pengumuman</td>
                            <td scope="col">{{$adminuniv->tgl_pengumuman->format('d M Y')}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <h3 class="mt-4 mb-2">Ketentuan</h3>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>

                        <tr>
                            <td scope="col">Indek Prestasi Semester</td>
                            <td scope="col">{{$adminuniv->ips}}</td>
                        </tr>
                        <tr>
                            <td scope="col">Indek Prestasi Komulatif</td>
                            <td scope="col">{{$adminuniv->ipk}}</td>
                        </tr>
                        <tr>
                            <td scope="col">Semester</td>
                            <td scope="col">{{$adminuniv->min_semester}} s/d {{$adminuniv->max_semester}}</td>
                        </tr>
                        <tr>
                            <td scope="col">Maksimal Penghasilan</td>
                            <td scope="col">Rp. {{$adminuniv->max_penghasilan}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <h3 class="mt-4 mb-2">Lampiran</h3>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>

                        @forelse ($adminuniv->penawaranUpload as $lampiran)
                            <tr>
                                <td scope="col">{{$lampiran->nama_upload}}</td>
                                <td scope="col">{{$lampiran->path_file}}</td>
                            </tr>
                            <tr>
                                <td scope="col">
                                    <object data="data_file/penawaran_upload/121020032138B1xi.jpeg" width="400" height="600"></object>
                                </td>
                            </tr>
                        @empty
                            <h5 style="color: #bdbdbd">*Data Tidak Tersedia</h5>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        <h3 class="mt-4 mb-2">Deskripsi</h3>
        <div class="row mb-3">
            <div class="col-12">
                <table class=" stable-striped">
                    <tbody>
                        <tr>
                        <td scope="col">{!! $adminuniv->deskripsi !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- button --}}
        
        <form action="{{$adminuniv->id_penawaran}}" method="POST"class="d-inline">
            @method('put')
            @csrf
            <button type="submit" class="btn btn-primary pull-right d-inline">Edit</button>
        </form>
        <form action="{{$adminuniv->id_penawaran}}" method="POST" class="d-inline">
            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure ?')">Delete</button>
            @method('Delete')
            @csrf
        </form>
        <a href="/adminuniversitas" class="btn btn-outline-warning">kembali</a>
    </div>
@endsection
