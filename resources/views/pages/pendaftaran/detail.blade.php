@extends('layouts.pendaftaran')
@section('title', 'Detail Beasiswa')
@section('content')
<section class="hero-banner magic-ball">
    <div class="container">
        <h1 class="text-center">{{$penawaran->nama_penawaran}}</h1>
        <h3 class="mt-4 mb-3">Informasi Umum</h3>
        <div class="row">
            <div class="col-12">
                <table>
                    <tbody>
                        <tr class="d-flex">
                            <td scope="col" class="col-8">Nama Penawaran</td>
                            <td scope="col" class="col-1">:</td>
                            <td scope="col" class="col-md col-sm col-lg-12">{{$penawaran->nama_penawaran}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col-8">Jenis Beasiswa</td>
                            <td scope="col" class="col-1">:</td>
                            <td scope="col" class="col-md col-sm col-lg-12">{{$penawaran->refJenisPenawaran->nama_beasiswa}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col-8">Tahun Dasar Akademik</td>
                            <td scope="col" class="col-1">:</td>
                            <td scope="col" class="col-md col-sm col-lg-12">{{$penawaran->tahun_dasar_akademik}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col-8">Kuota</td>
                            <td scope="col" class="col-1">:</td>
                            <td scope="col" class="col-md col-sm col-lg-12">{{$penawaran->jml_kuota}} Penerima</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <h3 class="mt-4 mb-3">Timeline</h3>
        <div class="row">
            <div class="col-12">
                <table>
                    <tbody>
                        <tr class="d-flex">
                            <td scope="col" class="col-6">Tanggal Penawaran</td>
                            <td scope=col class="col-1">:</td>
                            <td scope="col" class="col-md col-sm col-lg-12">{{$penawaran->tgl_awal_penawaran->format('d M Y')}}
                            s/d {{$penawaran->tgl_akhir_penawaran->format('d M Y')}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col-6">Tanggal Pendaftaran</td>
                            <td scope=col class="col-1">:</td>
                            <td scope="col" class="col-md col-sm col-lg-12">{{$penawaran->tgl_awal_pendaftaran->format('d M Y')}}
                                s/d {{$penawaran->tgl_akhir_pendaftaran->format('d M Y')}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col-6">Tanggal Verifikasi</td>
                            <td scope=col class="col-1">:</td>
                            <td scope="col" class="col-md col-sm col-lg-12">{{$penawaran->tgl_awal_verifikasi->format('d M Y')}}
                                s/d {{$penawaran->tgl_akhir_verifikasi->format('d M Y')}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col-6">Tanggal Penetapan</td>
                            <td scope=col class="col-1">:</td>
                            <td scope="col" class="col-md col-sm col-lg-12">{{$penawaran->tgl_awal_penetapan->format('d M Y')}}
                                s/d {{$penawaran->tgl_akhir_penetapan->format('d M Y')}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col-6">Tanggal Pengumuman</td>
                            <td scope=col class="col-1">:</td>
                            <td scope="col" class="col-md col-sm col-lg-12">{{$penawaran->tgl_pengumuman->format('d M Y')}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <h3 class="mt-4 mb-3">Ketentuan</h3>
        <div class="row">
            <div class="col-12">
                <table>
                    <tbody>

                        <tr class="d-flex">
                            <td scope="col" class="col-8">Minimal IPS</td>
                            <td scope="col" class=col-1>:</td>
                            <td scope="col" class="col-md col-sm col-lg-8">{{$penawaran->ips}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col-8">Minimal IPK</td>
                            <td scope="col" class=col-1>:</td>
                            <td scope="col" class="col-md col-sm col-lg-8">{{$penawaran->ipk}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col-8">Range Semester</td>
                            <td scope="col" class=col-1>:</td>
                            <td scope="col" class="col-md col-sm col-lg-8">{{$penawaran->min_semester}} s/d {{$penawaran->max_semester}}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="col" class="col-8">Maksimal Penghasilan</td>
                            <td scope="col" class=col-1>:</td>
                            <td scope="col" class="col-md col-sm col-lg-8">Rp. {{$penawaran->max_penghasilan}}</td>
                        </tr>
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
        <a href="{{url('/pendaftar/penawaran')}}" class="button button-success mt-4">Daftar</a>
    </div>
  </div>
</section>

@endsection