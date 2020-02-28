@extends('layouts.create')
@section('title', 'Tambah Penawaran')
@section('content')
    <div class="container col-6">
        <h3 class="mt-4 mb-4">Tambah Penawaran Beasiswa</h3>
        <form method="post" action="/adminuniversitas">
            @csrf
            {{-- nama penawaran --}}
            <div class="form-group">
                <label for="nama_penawaran">Nama Penawaran</label>
                <input type="nama_penawaran" class="form-control" id="nama_penawaran" name="nama_penawaran"required>
            </div>

            {{-- kuota --}}
            <div class="form-group">
                <label for="jml-kuota">Kuota</label>
                <input type="number" class="form-control" id="jml-kuota" name="jml-kuota" required>
            </div>

            <h4 class="mt-5 mb-2">Ketentuan</h4>
            {{-- Penawaran --}}
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tgl-awal-penawaran">Awal Penawaran</label>
                            <input type="date" class="form-control" id="tgl-awal-penawaran" name="tgl-awal-penawaran"required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tgl-akhir-penawaran">Akhir Penawaran</label>
                            <input type="date" class="form-control" id="tgl-akhir-penawaran" name="tgl-akhir-penawaran"required>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Pendaftaran --}}
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tgl-awal-pendaftaran">Awal Pendaftaran</label>
                            <input type="date" class="form-control" id="tgl-awal-pendaftaran" name="tgl-awal-pendaftaran"required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tgl-akhir-pendaftaran">Akhir Pendaftaran</label>
                            <input type="date" class="form-control" id="tgl-akhir-pendaftaran" name="tgl-akhir-pendaftaran"required>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Penetapan --}}
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tgl-awal-penetapan">Awal penetapan</label>
                            <input type="date" class="form-control" id="tgl-awal-penetapan" name="tgl-awal-penetapan"required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tgl-akhir-penetapan">Akhir Penetapan</label>
                            <input type="date" class="form-control" id="tgl-akhir-penetapan" name="tgl-akhir-penetapan"required>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Verifikasi --}}
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tgl-awal-verifikasi">Awal Verifikasi</label>
                            <input type="date" class="form-control" id="tgl-awal-verifikasi" name="tgl-awal-verifikasi"required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tgl-akhir-verifikasi">Akhir Verifikasi</label>
                            <input type="date" class="form-control" id="tgl-akhir-verifikasi" name="tgl-akhir-verifikasi"required>
                        </div>
                    </div>
                </div>
            </div>

            {{-- pengumuman --}}
            <div class="form-group">
                <label for="tgl-pengumuman">Tanggal Pengumuman</label>
                <input type="date" class="form-control" id="tgl-pengumuman" name="tgl-pengumuman" required>
            </div>

            <h4 class="mt-3 mb-2">Ketentuan</h4>
            <div class="form-group">
                <label for="ips">Indek Prestasi Semester</label>
                <input type="number" step="0.01" class="form-control" id="ips" name="ips"required>
            </div>
            <div class="form-group">
                <label for="ipk">Indek Prestasi Komulatif</label>
                <input type="number" step="0.01" class="form-control" id="ipk" name="ipk"required>
            </div>

            {{-- Semester --}}
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="min-semester">Minimal Semester</label>
                            <input type="number" class="form-control" id="min-semester" name="min-semester"required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="max-semester">Maksimal Semester</label>
                            <input type="number" class="form-control" id="max-semester" name="max-semester"required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="max-penghasilan">Maksimal Penghasilan</label>
                <input type="number" step="0.01" class="form-control" id="max-penghasilan" name="max-penghasilan" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
@endsection
