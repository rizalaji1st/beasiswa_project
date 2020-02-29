@extends('layouts.create')
@section('title', 'Tambah Penawaran')
@section('content')
    <div class="container col-6 mb-5 mt-5">
        <h3>Tambah Penawaran Beasiswa</h3>
        <form method="post" action="/adminuniversitas">
            @csrf
            {{-- nama penawaran --}}
            <div class="form-group">
                <label for="nama_penawaran">Nama Penawaran</label>
                <input type="nama_penawaran" class="form-control @error('nama_penawaran') is-invalid @enderror" id="nama_penawaran" name="nama_penawaran" placeholder="masukkan nama penawaran" >
                @error('nama_penawaran')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- kuota --}}
            <div class="form-group">
                <label for="jml_kuota">Kuota</label>
                <input type="number" class="form-control @error('jml_kuota') is-invalid @enderror" id="jml_kuota" name="jml_kuota"  placeholder="masukan jumlah kuota">
                @error('jml_kuota')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- id jenis penawaran beasiswa --}}
            <div class="form-group">
                <label for="id_jenis_beasiswa">Id Jenis beasiswa</label>
                <input type="id_jenis_beasiswa" class="form-control @error('id_jenis_beasiswa') is-invalid @enderror" id="id_jenis_beasiswa" name="id_jenis_beasiswa" >
                @error('id_jenis_penawaran')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <h4 class="mt-5 mb-2 mt-3">Ketentuan</h4>

            {{-- Penawaran --}}
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tgl_awal_penawaran">Awal Penawaran</label>
                        </div>
                            <input type="date" class="form-control @error('tgl_awal_penawaran') is-invalid @enderror" id="tgl_awal_penawaran" name="tgl_awal_penawaran">
                            @error('tgl_awal_penawaran')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tgl_akhir_penawaran">Akhir Penawaran</label>
                            <input type="date" class="form-control @error('tgl_akhir_penawaran') is-invalid @enderror" id="tgl_akhir_penawaran" name="tgl_akhir_penawaran">
                            @error('tgl_akhir_penawaran')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
                        </div>
                    </div>
                </div>
            </div>
            {{-- Pendaftaran --}}
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tgl_awal_pendaftaran">Awal Pendaftaran</label>
                            <input type="date" class="form-control @error('tgl_awal_pendaftaran') is-invalid @enderror" id="tgl_awal_pendaftaran" name="tgl_awal_pendaftaran">
                            @error('tgl_awal_pendaftaran')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tgl_akhir_pendaftaran">Akhir Pendaftaran</label>
                            <input type="date" class="form-control @error('tgl_akhir_pendaftaran') is-invalid @enderror" id="tgl_akhir_pendaftaran" name="tgl_akhir_pendaftaran">
                            @error('tgl_akhir_pendaftaran')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Verifikasi --}}
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tgl_awal_verifikasi">Awal Verifikasi</label>
                            <input type="date" class="form-control @error('tgl_awal_verifikasi') is-invalid @enderror" id="tgl_awal_verifikasi" name="tgl_awal_verifikasi">
                            @error('tgl_awal_verifikasi')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tgl_akhir_verifikasi">Akhir Verifikasi</label>
                            <input type="date" class="form-control @error('tgl_akhir_verifikasi') is-invalid @enderror" id="tgl_akhir_verifikasi" name="tgl_akhir_verifikasi">
                            @error('tgl_akhir_verifikasi')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
                        </div>
                    </div>
                </div>
            </div>
            {{-- Penetapan --}}
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tgl_awal_penetapan">Awal penetapan</label>
                            <input type="date" class="form-control @error('tgl_awal_penetapan') is-invalid @enderror" id="tgl_awal_penetapan" name="tgl_awal_penetapan">
                            @error('tgl_awal_penetapan')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tgl_akhir_penetapan">Akhir Penetapan</label>
                            <input type="date" class="form-control @error('tgl_akhir_penetapan') is-invalid @enderror" id="tgl_akhir_penetapan" name="tgl_akhir_penetapan">
                            @error('tgl_akhir_penetapan')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
                        </div>
                    </div>
                </div>
            </div>
            {{-- pengumuman --}}
            <div class="form-group">
                <label for="tgl_pengumuman">Tanggal Pengumuman</label>
                <input type="date" class="form-control @error('tgl_pengumuman') is-invalid @enderror" id="tgl_pengumuman" name="tgl_pengumuman" >
                @error('tgl_pengumuman')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <h4 class="mt-3 mb-2">Ketentuan</h4>
            <div class="form-group">
                <label for="ips">Indek Prestasi Semester</label>
                <input type="number" step="0.01" class="form-control @error('ips') is-invalid @enderror" id="ips" name="ips">
                @error('ips')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="ipk">Indek Prestasi Komulatif</label>
                <input type="number" step="0.01" class="form-control @error('ipk') is-invalid @enderror" id="ipk" name="ipk">
                @error('ipk')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Semester --}}
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="min_semester">Minimal Semester</label>
                            <input type="number" class="form-control @error('min_semester') is-invalid @enderror" id="min_semester" name="min_semester">
                            @error('min_semester')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="max_semester">Maksimal Semester</label>
                            <input type="number" class="form-control @error('max_semester') is-invalid @enderror" id="max_semester" name="max_semester">
                            @error('max_semester')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="max_penghasilan">Maksimal Penghasilan</label>
                <input type="number" step="0.01" class="form-control @error('max_penghasilan') is-invalid @enderror" id="max_penghasilan" name="max_penghasilan" >
                @error('max_penghasilan')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>


@endsection
