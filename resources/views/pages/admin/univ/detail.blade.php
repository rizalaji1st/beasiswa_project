@extends('layouts.adminuniv')
@section('title', 'Detail Beasiswa')
@section('status-dashboard', 'active')
@section('content')
    <div class="container">
    <h3 mt-2 mb-2>Informasi Umum</h3>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td scope="col">nama Beasiswa</td>
                            <td scope="col">{{$adminuniv->nama_penawaran}}</td>
                        </tr>
                        <tr>
                            <td scope="col">Tahun</td>
                            <td scope="col">{{$adminuniv->tahun}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <h3 mt-2 mb-2>Timeline</h3>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td scope="col">Tanggal Penawaran</td>
                            <td scope="col">{{$adminuniv->tgl_awal_penawaran->format('d')}}
                            s/d {{$adminuniv->tgl_akhir_penawaran->format('d M Y')}}</td>
                        </tr>
                        <tr>
                            <td scope="col">Tanggal Pendaftaran</td>
                            <td scope="col">{{$adminuniv->tgl_awal_pendaftaran->format('d')}}
                                s/d {{$adminuniv->tgl_akhir_pendaftaran->format('d M Y')}}</td>
                        </tr>
                        <tr>
                            <td scope="col">Tanggal Penetapan</td>
                            <td scope="col">{{$adminuniv->tgl_awal_penetapan->format('d')}}
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
    </div>
@endsection
