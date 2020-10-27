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
        <h3 class="mt-4 mb-3">Informasi Umum</h3>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr class="d-flex">
                            <td scope="col" class="col">Nama Penawaran</td>
                            <td scope="col" class="col">{{$adminuniv->nama_penawaran}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col">Jenis Beasiswa</td>
                            <td scope="col" class="col">{{$adminuniv->refJenisPenawaran->nama_beasiswa}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col">Tahun</td>
                            <td scope="col" class="col">{{$adminuniv->tahun->format('Y')}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col">Tahun Dasar Akademik</td>
                            <td scope="col" class="col">{{$adminuniv->tahun_dasar_akademik}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col">Penerima boleh Menerima beasiswa lain</td>
                            <td scope="col" class="col">{{$adminuniv->is_double == true ? 'boleh' : 'tidak boleh'}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col">Kuota</td>
                            <td scope="col" class="col">{{$adminuniv->jml_kuota}} Penerima</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <h3 class="mt-4 mb-3">Detail Kuota Fakultas</h3>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        @forelse ($fakultas as $item)
                        <tr class="d-flex">
                            <td scope="col" class="col">{{$item->refFakultas->nama_fakultas}}</td>
                            <td scope="col" class="col">{{$item->jml_kuota}} Penerima</td>
                        </tr>
                        @empty
                            <h5 style="color: #bdbdbd">Tidak ada kuota fakultas</h5>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <h3 class="mt-4 mb-3">Timeline</h3>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr class="d-flex">
                            <td scope="col" class="col">Tanggal Penawaran</td>
                            <td scope="col" class="col">{{$adminuniv->tgl_awal_penawaran->format('d M Y')}}
                            s/d {{$adminuniv->tgl_akhir_penawaran->format('d M Y')}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col">Tanggal Pendaftaran</td>
                            <td scope="col" class="col">{{$adminuniv->tgl_awal_pendaftaran->format('d M Y')}}
                                s/d {{$adminuniv->tgl_akhir_pendaftaran->format('d M Y')}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col">Tanggal Verifikasi</td>
                            <td scope="col" class="col">{{$adminuniv->tgl_awal_verifikasi->format('d M Y')}}
                                s/d {{$adminuniv->tgl_akhir_verifikasi->format('d M Y')}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col">Tanggal Penetapan</td>
                            <td scope="col" class="col">{{$adminuniv->tgl_awal_penetapan->format('d M Y')}}
                                s/d {{$adminuniv->tgl_akhir_penetapan->format('d M Y')}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col">Tanggal Pengumuman</td>
                            <td scope="col" class="col">{{$adminuniv->tgl_pengumuman->format('d M Y')}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <h3 class="mt-4 mb-3">Ketentuan</h3>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>

                        <tr class="d-flex">
                            <td scope="col" class="col">Indek Prestasi Semester</td>
                            <td scope="col" class="col">{{$adminuniv->ips}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col">Indek Prestasi Komulatif</td>
                            <td scope="col" class="col">{{$adminuniv->ipk}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col">Semester</td>
                            <td scope="col" class="col">{{$adminuniv->min_semester}} s/d {{$adminuniv->max_semester}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col">Maksimal Penghasilan</td>
                            <td scope="col" class="col">Rp. {{$adminuniv->max_penghasilan}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <h3 class="mt-4 mb-3">Kriteria Penilaian</h3>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="d-flex">
                            <th scope="col" class="text-center col">Kriteria</th>
                            <th scope="col" class="text-center col">Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($adminuniv->kriteriaPenilaian as $item)
                        <tr class="d-flex">
                            <td scope="col" class="col">{{$item->nama_kriteria}}</td>
                            <td scope="col" class="col">{{$item->bobot}} poin</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <h3 class="mt-4 mb-3">Lampiran</h3>
        <div class="row">
            <div class="col-12">
                @forelse ($adminuniv->penawaranUpload as $lampiran)
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr class="d-flex">
                            <th colspan="2" class="col">Lampiran  {{$loop->iteration}}</th>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col">Nama Upload</td>
                            <td scope="col" class="col">{{$lampiran->nama_upload}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col">Nama File</td>
                            <td scope="col" class="col"><a href="{{Storage::url($lampiran->path_file)}}" target="_blank">{{$lampiran->nama_upload}}.{{$lampiran->ekstensi}}</a></td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col">Deskripsi</td>
                            <td scope="col" class="col">{{$lampiran->deskripsi}}</td>
                        </tr>
                    </tbody>
                </table>
                @empty
                    <h5 style="color: #bdbdbd">*Data Tidak Tersedia</h5>
                @endforelse
            </div>
        </div>
        <h3 class="mt-4 mb-3">Lampiran Pendaftar</h3>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        @forelse ($lampiranPendaftar as $item)
                            <tr class="d-flex">
                                <td scope="col" class="col">{{$item->refJenisFile->nama_jenis_file}}</td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <h3 class="mt-4 mb-3">Deskripsi</h3>
        <div class="row mb-3">
            <div class="col-12">
                <table class=" stable-striped">
                    <tbody>
                        <tr class="d-flex">
                            <td scope="col" class="col">{!! $adminuniv->deskripsi !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- button --}}
        
        <form action="{{$adminuniv->id_penawaran}}/edit" method="GET"class="d-inline">
            {{-- @method('put') --}}
            @csrf
            <button type="submit" class="btn btn-primary pull-right d-inline"><i class="fas fa-pencil-alt    "></i> Edit</button>
        </form>
        <form action="{{$adminuniv->id_penawaran}}" method="POST" class="d-inline">
            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt    "></i> Delete</button>
            @method('Delete')
            @csrf
        </form>
        <a href="/adminunivs" class="btn btn-outline-warning">kembali</a>
    </div>
@endsection
