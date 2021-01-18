@extends('layouts.adminuniv')
@section('title', 'Detail Beasiswa')
@section('status-penawaran', 'active')
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
        <div class="section-header">
            <h1>Detail {{$penawaran->nama_penawaran}}</h1>
        </div>
        <h3 class="mt-4 mb-3">Informasi Umum</h3>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td style="width: 50%">Nama Penawaran</td>
                            <td style="width: 50%">{{$penawaran->nama_penawaran}}</td>
                        </tr>
                        <tr>
                            <td>Jenis Beasiswa</td>
                            <td>{{$penawaran->refJenisPenawaran->nama_beasiswa}}</td>
                        </tr>
                        <tr>
                            <td>Tahun</td>
                            <td>{{$penawaran->tahun->format('Y')}}</td>
                        </tr>
                        <tr>
                            <td>Tahun Dasar Akademik</td>
                            <td>{{$penawaran->tahun_dasar_akademik}}</td>
                        </tr>
                        <tr>
                            <td>Penerima boleh Menerima beasiswa lain</td>
                            <td>{{$penawaran->is_double == true ? 'boleh' : 'tidak boleh'}}</td>
                        </tr>
                        <tr>
                            <td>Kuota</td>
                            <td>{{$penawaran->jml_kuota}} Penerima</td>
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
                        <tr>
                            <td style="width: 50%">{{$item->refFakultas->nama_fakultas}}</td>
                            <td style="width: 50%">{{$item->jml_kuota}} Penerima</td>
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
                        <tr>
                            <td style="width: 50%">Tanggal Penawaran</td>
                            <td style="width: 50%">{{$penawaran->tgl_awal_penawaran->format('d M Y')}}
                            s/d {{$penawaran->tgl_akhir_penawaran->format('d M Y')}}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Tanggal Pendaftaran</td>
                            <td style="width: 50%">{{$penawaran->tgl_awal_pendaftaran->format('d M Y')}}
                                s/d {{$penawaran->tgl_akhir_pendaftaran->format('d M Y')}}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Tanggal Verifikasi</td>
                            <td style="width: 50%">{{$penawaran->tgl_awal_verifikasi->format('d M Y')}}
                                s/d {{$penawaran->tgl_akhir_verifikasi->format('d M Y')}}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Tanggal Penetapan</td>
                            <td style="width: 50%">{{$penawaran->tgl_awal_penetapan->format('d M Y')}}
                                s/d {{$penawaran->tgl_akhir_penetapan->format('d M Y')}}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Tanggal Pengumuman</td>
                            <td style="width: 50%">{{$penawaran->tgl_pengumuman->format('d M Y')}}</td>
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

                        <tr>
                            <td style="width: 50%">Indek Prestasi Semester</td>
                            <td style="width: 50%">{{$penawaran->ips}}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Indek Prestasi Komulatif</td>
                            <td style="width: 50%">{{$penawaran->ipk}}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Semester</td>
                            <td style="width: 50%">{{$penawaran->min_semester}} s/d {{$penawaran->max_semester}}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Maksimal Penghasilan</td>
                            <td style="width: 50%">Rp. {{$penawaran->max_penghasilan}}</td>
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
                        <tr>
                            <th style="width: 50%" class="text-center">Kriteria</th>
                            <th style="width: 50%" class="text-center">Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($penawaran->kriteriaPenilaian as $item)
                        <tr>
                            <td style="width: 50%">{{$item->nama_kriteria}}</td>
                            <td style="width: 50%">{{$item->bobot}} poin</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <h3 class="mt-4 mb-3">Lampiran</h3>
        <div class="row">
            <div class="col-12">
                @forelse ($penawaran->penawaranUpload as $lampiran)
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th colspan="2">Lampiran  {{$loop->iteration}}</th>
                        </tr>
                        <tr>
                            <td style="width: 50%">Nama Upload</td>
                            <td style="width: 50%">{{$lampiran->nama_upload}}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Nama File</td>
                            <td style="width: 50%"><a href="{{Storage::url($lampiran->path_file)}}" target="_blank">{{$lampiran->nama_upload}}.{{$lampiran->ekstensi}}</a></td>
                        </tr>
                        <tr>
                            <td style="width: 50%">Deskripsi</td>
                            <td style="width: 50%">{{$lampiran->deskripsi}}</td>
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
                            <tr>
                                <td style="width: 50%">{{$item->refJenisFile->nama_jenis_file}}</td>
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
                            <td scope="col" class="col">{!! $penawaran->deskripsi !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- button --}}
        
        <form action="{{route('admin.penawarans.edit',$penawaran)}}" method="GET"class="d-inline">
            {{-- @method('put') --}}
            @csrf
            <button type="submit" class="btn btn-primary pull-right d-inline"><i class="fas fa-pencil-alt    "></i> Edit</button>
        </form>
        <form action="{{route('admin.penawarans.destroy', $penawaran)}}" method="POST" class="d-inline">
            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt    "></i> Delete</button>
            @method('Delete')
            @csrf
        </form>
        <a href="{{route('admin.penawarans.index')}}" class="btn btn-outline-warning">kembali</a>
    </div>
@endsection
