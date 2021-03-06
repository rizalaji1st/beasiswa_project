@extends('layouts.adminuniv')
@section('title', 'Tambah Penawaran')
@section('status-penawaran', 'active')
@section('content')
<div class="container col-10 mb-5">
    <div class="section-header">
        <h1>Tambah Penawaran Beasiswa</h1>
    </div>
    <h3 class="mt-5 mb-3">Informasi Umum</h3>
    <form method="post" action="{{route('admin.penawarans.index')}}" enctype="multipart/form-data" id="form-penawaran"
        name="penawaran" onsubmit="return validated()" autocomplete="off">
        @csrf
        {{-- nama penawaran --}}
        <div class="form-group">
            <label for="nama_penawaran">Nama Penawaran</label>
            <input type="nama_penawaran" class="form-control @error('nama_penawaran') is-invalid @enderror"
                id="nama_penawaran" name="nama_penawaran" placeholder="masukkan nama penawaran"
                value="{{old('nama_penawaran')}}" required>
            @error('nama_penawaran')
            <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- jenis penawaran beasiswa --}}
        <div class="form-group">
            <label for="id_jenis_beasiswa">Jenis Beasiswa</label>
            <select class="custom-select form-control fstdropdown-select" name="id_jenis_beasiswa"
                id="id_jenis_beasiswa" value="{{old('id_jenis_beasiswa')}}" required>
                <option value="" disabled selected>--Pilih salah satu--</option>
                @foreach ($jenisBeasiswa as $item)
                <option value="{{$item->id_jenis_beasiswa}}"
                    {{old("id_jenis_beasiswa") == $item->id_jenis_beasiswa ? "selected":"" }}>{{$item->nama_beasiswa}}
                </option>
                @endforeach
            </select>
        </div>

        {{-- tahun dasar akademik --}}
        <div class="form-group">
            <label for="tahun_dasar_akademik">Tahun Dasar Akademik</label>
            <select class="custom-select form-control fstdropdown-select" name="tahun_dasar_akademik"
                id="tahun_dasar_akademik" value="{{old('tahun_dasar_akademik')}}" required>
                <option value="" disabled selected>--Pilih tahun akademik--</option>
                @foreach ($years as $item)
                @php
                $nama = $item+1;
                @endphp
                <option value="{{$item}}/{{$item+1}}"
                    {{old("tahun_dasar_akademik") ==  $item.'/'.$nama ? "selected":"" }}>{{$item}}/{{$item+1}}</option>
                @endforeach
            </select>
        </div>

        {{-- is double --}}
        <div class="form-group">
            <input type="checkbox" name="is_double" value="true" id="is_double" {{old('is_double') ? 'checked' : ''}}>
            <label for="is_double">Centang Jika Penerima Beasiswa Ini dapat Menerima Beasiswa Lain</label>
        </div>

        {{-- konfigurasi kuota --}}
        <h3 class="mt-5 mb-4">Konfigurasi Kuota</h3>
        <div class="form-group">
            <div class="custom-control custom-radio">
                <input type="radio" id="value1" name="pilihKuota" value="value1" class="custom-control-input"
                    {{old("pilihKuota") == "value1" ? 'checked':''}}>
                <label class="custom-control-label" for="value1">Abaikan Asal Fakultas</label>
                <p style="color: #bdbdbd; font-size:14px;">Asal fakultas tidak akan berpengaruh terhadap Ketentuan
                    seleksi</p>
            </div>

            {{-- kuota Total --}}
            <div class="form-group kuota-total" id="kuota-total" class="custom-control-input" style="display: none">
                <input type="number" class="form-control" id="jml_kuota" name="jml_kuota"
                    placeholder="masukan jumlah kuota penerima" value="{{old('jml_kuota')}}">
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="value2" value="value2" name="pilihKuota" class="custom-control-input"
                    {{old("pilihKuota") == "value2" ? 'checked':''}}>
                <label class="custom-control-label" for="value2">Tentukan kuota Perfakultas</label>
                <p style="color: #bdbdbd; font-size:14px;">Jumlah pendaftar yang diterima berdasarkan kuota
                    masing-masing fakultas</p>
            </div>
            <br>
            <div class="form-group fakultas" id="fakultas" style="display: none">
                <div class="form-group row">
                    <label for="fkip" class="col-sm-6 col-form-label">Fakultas Keguruan dan Ilmu Pendidikan</label>
                    <div class="col-sm-6">
                        <input name="fkip" type="number" placeholder="masukkan kuota" class="form-control" id="fkip"
                            value="{{old('fkip')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fmipa" class="col-sm-6 col-form-label">Fakultas Matematika dan Ilmu Alam</label>
                    <div class="col-sm-6">
                        <input name="fmipa" type="number" placeholder="masukkan kuota" class="form-control" id="fmipa"
                            value="{{old('fmipa')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fk" class="col-sm-6 col-form-label">Fakultas Kedokteran</label>
                    <div class="col-sm-6">
                        <input name="fk" type="number" placeholder="masukkan kuota" class="form-control" id="fk"
                            value="{{old('fk')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fp" class="col-sm-6 col-form-label">Fakultas Pertanian</label>
                    <div class="col-sm-6">
                        <input name="fp" type="number" placeholder="masukkan kuota" class="form-control" id="fp"
                            value="{{old('fp')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ft" class="col-sm-6 col-form-label">Fakultas Teknik</label>
                    <div class="col-sm-6">
                        <input name="ft" type="number" placeholder="masukkan kuota" class="form-control" id="ft"
                            value="{{old('ft')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fib" class="col-sm-6 col-form-label">Fakultas Ilmu Budaya</label>
                    <div class="col-sm-6">
                        <input name="fib" type="number" placeholder="masukkan kuota" class="form-control" id="fib"
                            value="{{old('fib')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="feb" class="col-sm-6 col-form-label">Fakultas Ekonomi Bisnis</label>
                    <div class="col-sm-6">
                        <input name="feb" type="number" placeholder="masukkan kuota" class="form-control" id="feb"
                            value="{{old('feb')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fh" class="col-sm-6 col-form-label">Fakultas Hukum</label>
                    <div class="col-sm-6">
                        <input name="fh" type="number" placeholder="masukkan kuota" class="form-control" id="fh"
                            value="{{old('fh')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fsrd" class="col-sm-6 col-form-label">Fakultas Seni Rupa dan Desain</label>
                    <div class="col-sm-6">
                        <input name="fsrd" type="number" placeholder="masukkan kuota" class="form-control" id="fsrd"
                            value="{{old('fsrd')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fisip" class="col-sm-6 col-form-label">Fakultas Ilmu Sosial dan Politik</label>
                    <div class="col-sm-6">
                        <input name="fisip" type="number" placeholder="masukkan kuota" class="form-control" id="fisip"
                            value="{{old('fisip')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fkor" class="col-sm-6 col-form-label">Fakultas Keolahragaan</label>
                    <div class="col-sm-6">
                        <input name="fkor" type="number" placeholder="masukkan kuota" class="form-control" id="fkor"
                            value="{{old('fkor')}}">
                    </div>
                </div>
            </div>
        </div>

        {{-- Timeline --}}
        <h3 class="mt-4 mb-3">Timeline</h3>
        {{-- Penawaran --}}
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="tgl_awal_penawaran">Awal Penawaran</label>
                        <input type="date" class="form-control @error('tgl_awal_penawaran') is-invalid @enderror"
                            id="tgl_awal_penawaran" name="tgl_awal_penawaran" value="{{old('tgl_awal_penawaran')}}"
                            required>
                        @error('tgl_awal_penawaran')
                        <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class=" alert alert-danger invalid-feedback" id="tgl_awal_penawaran_error">Tanggal Awal
                            Penawaran harus paling awal dari apapun</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="tgl_akhir_penawaran">Akhir Penawaran</label>
                        <input type="date" class="form-control @error('tgl_akhir_penawaran') is-invalid @enderror"
                            id="tgl_akhir_penawaran" name="tgl_akhir_penawaran" value="{{old('tgl_akhir_penawaran')}}"
                            required>
                        @error('tgl_akhir_penawaran')
                        <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class=" alert alert-danger invalid-feedback" id="tgl_akhir_penawaran_error">Tanggal Akhir
                            Penawaran harus setelah Tanggal Akhir Penawaran</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Pendaftaran --}}
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="tgl_awal_pendaftaran">Awal Pendaftaran</label>
                        <input type="date" class="form-control @error('tgl_awal_pendaftaran') is-invalid @enderror"
                            id="tgl_awal_pendaftaran" name="tgl_awal_pendaftaran"
                            value="{{old('tgl_awal_pendaftaran')}}" required>
                        @error('tgl_awal_pendaftaran')
                        <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class=" alert alert-danger invalid-feedback" id="tgl_awal_pendaftaran_error">Tanggal Awal
                            Pendaftaran harus setelah Tanggal Awal Penawaran</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="tgl_akhir_pendaftaran">Akhir Pendaftaran</label>
                        <input type="date" class="form-control @error('tgl_akhir_pendaftaran') is-invalid @enderror"
                            id="tgl_akhir_pendaftaran" name="tgl_akhir_pendaftaran"
                            value="{{old('tgl_akhir_pendaftaran')}}" required>
                        @error('tgl_akhir_pendaftaran')
                        <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class=" alert alert-danger invalid-feedback" id="tgl_akhir_pendaftaran_error">Tanggal Awal
                            Pendaftaran harus setelah Tanggal Awal Pendaftaran</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Verifikasi --}}
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="tgl_awal_verifikasi">Awal Verifikasi</label>
                        <input type="date" class="form-control @error('tgl_awal_verifikasi') is-invalid @enderror"
                            id="tgl_awal_verifikasi" name="tgl_awal_verifikasi" value="{{old('tgl_awal_verifikasi')}}"
                            required>
                        @error('tgl_awal_verifikasi')
                        <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class=" alert alert-danger invalid-feedback" id="tgl_awal_verifikasi_error">Tanggal Awal
                            Verifikasi harus setelah Tanggal Awal Pendaftaran</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="tgl_akhir_verifikasi">Akhir Verifikasi</label>
                        <input type="date" class="form-control @error('tgl_akhir_verifikasi') is-invalid @enderror"
                            id="tgl_akhir_verifikasi" name="tgl_akhir_verifikasi"
                            value="{{old('tgl_akhir_verifikasi')}}" required>
                        @error('tgl_akhir_verifikasi')
                        <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class=" alert alert-danger invalid-feedback" id="tgl_akhir_verifikasi_error">Tanggal Akhir
                            Verifikasi harus setelah Tanggal Akhir Pendaftaran</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Penetapan --}}
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="tgl_awal_penetapan">Awal penetapan</label>
                        <input type="date" class="form-control @error('tgl_awal_penetapan') is-invalid @enderror"
                            id="tgl_awal_penetapan" name="tgl_awal_penetapan" value="{{old('tgl_awal_penetapan')}}"
                            required>
                        @error('tgl_awal_penetapan')
                        <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class=" alert alert-danger invalid-feedback" id="tgl_awal_penetapan_error">Tanggal Awal
                            Penetapan harus setelah Tanggal Akhir Verifikasi</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="tgl_akhir_penetapan">Akhir Penetapan</label>
                        <input type="date" class="form-control @error('tgl_akhir_penetapan') is-invalid @enderror"
                            id="tgl_akhir_penetapan" name="tgl_akhir_penetapan" value="{{old('tgl_akhir_penetapan')}}"
                            required>
                        @error('tgl_akhir_penetapan')
                        <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class=" alert alert-danger invalid-feedback" id="tgl_akhir_penetapan_error">Tanggal Akhir
                            Penetapan harus setelah Tanggal Awal Penetapan</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- pengumuman --}}
        <div class="form-group">
            <label for="tgl_pengumuman">Tanggal Pengumuman</label>
            <input type="date" class="form-control @error('tgl_pengumuman') is-invalid @enderror" id="tgl_pengumuman"
                name="tgl_pengumuman" value="{{old('tgl_pengumuman')}}" required>
            @error('tgl_pengumuman')
            <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
            @enderror
            <div class=" alert alert-danger invalid-feedback" id="tgl_pengumuman_error">Tanggal Pengumuman harus setelah
                Tanggal Akhir Penetapan</div>
            <div class=" alert alert-danger invalid-feedback" id="tgl_pengumuman_error1">Tanggal Pengumuman harus sebelum
                Tanggal Akhir Penawaran</div>
        </div>
        <br>
        {{-- deskripsi --}}
        <h3 class="mt-4 mb-3">Deskripsi</h3>
        <div class="form-group">
            <textarea type="text" class="form-control" id="deskripsi" placeholder="Tulis Deskripsi Beasiswa" rows="20"
                name="deskripsi" height="20">{{old('deskripsi')}}</textarea>
        </div>

        {{-- ketentuan --}}
        <h4 class="mt-5 mb-3">Ketentuan</h4>
        <div class="form-group">
            <label for="ips">Indek Prestasi Semester</label>
            <input type="number" step="0.01" class="form-control @error('ips') is-invalid @enderror"
                placeholder="masukkan ips" id="ips" name="ips" value="{{old('ips')}}" required>
            @error('ips')
            <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
            @enderror
            <div class=" alert alert-danger invalid-feedback" id="ips_error">Indek prestasi semester nilai 1-4</div>
        </div>
        <div class="form-group">
            <label for="ipk">Indek Prestasi Komulatif</label>
            <input type="number" step="0.01" class="form-control @error('ipk') is-invalid @enderror"
                placeholder="masukkan ipk" id="ipk" name="ipk" value="{{old('ipk')}}" required>
            @error('ipk')
            <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
            @enderror
            <div class=" alert alert-danger invalid-feedback" id="ipk_error">Indek prestasi komulatif nilai 1-4</div>
        </div>
        {{-- Semester --}}
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="min_semester">Minimal Semester</label>
                        <input type="number" class="form-control @error('min_semester') is-invalid @enderror"
                            placeholder="masukkan minimal semester" id="min_semester" name="min_semester"
                            value="{{old('min_semester')}}" required>
                        @error('min_semester')
                        <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class=" alert alert-danger invalid-feedback" id="min_semester_error">Minimal Semester harus
                            lebih kecil dari Maksimal Semester | Semester: 1-8</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="max_semester">Maksimal Semester</label>
                        <input type="number" class="form-control @error('max_semester') is-invalid @enderror"
                            placeholder="masukkan maksimal semester" id="max_semester" name="max_semester"
                            value="{{old('max_semester')}}" required>
                        @error('max_semester')
                        <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class=" alert alert-danger invalid-feedback" id="max_semester_error">Maksimal Semester
                            harus lebih besar dari Minimal Semester | Semester: 1-8</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="max_penghasilan">Maksimal Penghasilan</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                </div>
                <input type="number" step="0.01" class="form-control" id="max_penghasilan"
                    placeholder="masukkan maksimal penghasilan" name="max_penghasilan"
                    value="{{old('max_penghasilan')}}" required>
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
            </div>
        </div>

        {{-- bobot penilaian --}}
        <h3 class="mt-5 mb-4">Bobot Penilaian</h3>
        <div class="form-group" id="form-penilaian">
            <label for="penilaian">Masukkan Bobot Penilaian</label>
        </div>
        <button type="button" class="btn btn-primary btn-penilaian mb-4 btn-sm"><i class="fa fa-plus-circle"
                aria-hidden="true"></i>Tambah</button>
        <div class="form-group">
            <input type="text" name="myCountPenilaian" id="myCountPenilaian" hidden>
        </div>


        {{-- lampiran --}}
        <h3 class="mt-5 mb-4">Lampiran</h3>
        <div class="form-group" id="form-lampiran">
            <label for="lampiran">Lampiran Penawaran</label>
            
        </div>

        <button type="button" class="btn btn-primary click mb-4 btn-sm"><i class="fa fa-plus-circle"
                aria-hidden="true"></i>Tambah</button>
        <div class="form-group">
            <input type="text" name="myCount" id="myCount" hidden>
        </div>
        <div class="form-group">
            <input type="text" name="myCountPendaftar" id="myCountPendaftar" hidden>
        </div>

        <div class="from-group" id="lampiran-pendaftar">
            <label for="lampiran_pendaftar">Lampiran Pendaftar</label>
            <p for="lampiran_pendaftar" style="color: #bdbdbd">*masukkan dokumen yang harus diupload pendaftar</p>
        </div>
        <button type="button" class="btn btn-primary tambah-lampiran-pendaftar mb-4 btn-sm"><i class="fa fa-plus-circle"
                aria-hidden="true"></i>Tambah</button>
        <br>
        <br>
        <br>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> Simpan</button>
        <a href="{{route('admin.penawarans.index')}}" class="btn btn-outline-warning">Batal</a>


    </form>
</div>
@endsection

{{-- regex --}}
@push('addon-script')
<script>
    var awal_penawaran = document.forms['penawaran']['tgl_awal_penawaran'];
        var akhir_penawaran = document.forms['penawaran']['tgl_akhir_penawaran'];
        var awal_pendaftaran = document.forms['penawaran']['tgl_awal_pendaftaran'];
        var akhir_pendaftaran = document.forms['penawaran']['tgl_akhir_pendaftaran'];
        var awal_verifikasi = document.forms['penawaran']['tgl_awal_verifikasi'];
        var akhir_verifikasi = document.forms['penawaran']['tgl_akhir_verifikasi'];
        var awal_penetapan = document.forms['penawaran']['tgl_awal_penetapan'];
        var akhir_penetapan = document.forms['penawaran']['tgl_akhir_penetapan'];
        var pengumuman = document.forms['penawaran']['tgl_pengumuman'];
        
        var awal_penawaran_error = document.getElementById('tgl_awal_penawaran_error');
        var akhir_penawaran_error = document.getElementById('tgl_akhir_penawaran_error');
        var awal_pendaftaran_error = document.getElementById('tgl_awal_pendaftaran_error');
        var akhir_pendaftaran_error = document.getElementById('tgl_akhir_pendaftaran_error');
        var awal_verifikasi_error = document.getElementById('tgl_awal_verifikasi_error');
        var akhir_verifikasi_error = document.getElementById('tgl_akhir_verifikasi_error');
        var awal_penetapan_error = document.getElementById('tgl_awal_penetapan_error');
        var akhir_penetapan_error = document.getElementById('tgl_akhir_penetapan_error');
        var pengumuman_error = document.getElementById('tgl_pengumuman_error');

        var ips = document.forms['penawaran']['ips'];
        var ipk = document.forms['penawaran']['ipk'];
        var min_semester = document.forms['penawaran']['min_semester'];
        var max_semester = document.forms['penawaran']['max_semester'];

        var ips_error = document.getElementById('ips_error');
        var ipk_error = document.getElementById('ipk_error');
        var mix_semester_error = document.getElementById('min_semester_error');
        var max_semester_error = document.getElementById('max_semester_error');

        ips.addEventListener('textInput',ips_Verify);
        ipk.addEventListener('textInput',ipk_Verify);
        min_semester.addEventListener('textInput',min_semester_Verify);
        max_semester.addEventListener('textInput',max_semester_Verify);
        
        awal_penawaran.addEventListener('input',awal_penawaran_Verify);
        akhir_penawaran.addEventListener('input',akhir_penawaran_Verify);
        awal_pendaftaran.addEventListener('input',awal_pendaftaran_Verify);
        akhir_pendaftaran.addEventListener('input',akhir_pendaftaran_Verify);
        awal_verifikasi.addEventListener('input',awal_verifikasi_Verify);
        akhir_verifikasi.addEventListener('input',akhir_verifikasi_Verify);
        awal_penetapan.addEventListener('input',awal_penetapan_Verify);
        akhir_penetapan.addEventListener('input',akhir_penetapan_Verify);
        pengumuman.addEventListener('input',pengumuman_Verify);

        function validated(){

            if(tgl_akhir_penawaran.value <= tgl_awal_penawaran.value){
                tgl_akhir_penawaran.style.border = "1px solid red";
                tgl_akhir_penawaran_error.style.display = "block";
                tgl_akhir_penawaran.scrollIntoView();
                return false;
            }
            if(tgl_awal_pendaftaran.value <= tgl_awal_penawaran.value){
                tgl_awal_pendaftaran.style.border = "1px solid red";
                tgl_awal_pendaftaran_error.style.display = "block";
                tgl_awal_pendaftaran.scrollIntoView();
                return false;
            }
            if(tgl_akhir_pendaftaran.value <= tgl_awal_pendaftaran.value){
                tgl_akhir_pendaftaran.style.border = "1px solid red";
                tgl_akhir_pendaftaran_error.style.display = "block";
                tgl_akhir_pendaftaran.scrollIntoView();
                return false;
            }
            if(tgl_awal_verifikasi.value <= tgl_awal_pendaftaran.value){
                tgl_awal_verifikasi.style.border = "1px solid red";
                tgl_awal_verifikasi_error.style.display = "block";
                tgl_awal_verifikasi.scrollIntoView();
                return false;
            }
            if(tgl_akhir_verifikasi.value <= tgl_akhir_pendaftaran.value){
                tgl_akhir_verifikasi.style.border = "1px solid red";
                tgl_akhir_verifikasi_error.style.display = "block";
                tgl_akhir_verifikasi.scrollIntoView();
                return false;
            }
            if(tgl_awal_penetapan.value <= tgl_awal_verifikasi.value){
                tgl_awal_penetapan.style.border = "1px solid red";
                tgl_awal_penetapan_error.style.display = "block";
                tgl_awal_penetapan.scrollIntoView();
                return false;
            }
            if(tgl_akhir_penetapan.value <= tgl_awal_penetapan.value){
                tgl_akhir_penetapan.style.border = "1px solid red";
                tgl_akhir_penetapan_error.style.display = "block";
                tgl_akhir_penetapan.scrollIntoView();
                return false;
            }
            if(tgl_pengumuman.value <= tgl_akhir_penetapan.value){
                tgl_pengumuman.style.border = "1px solid red";
                tgl_pengumuman_error.style.display = "block";
                tgl_pengumuman.scrollIntoView();
                return false;
            }
            if(tgl_akhir_penawaran.value <= tgl_pengumuman.value){
                tgl_pengumuman.style.border = "1px solid red";
                tgl_pengumuman_error1.style.display = "block";
                tgl_pengumuman.scrollIntoView();
                return false;
            }

            //ips
            if(ips.value > 4 || ips.value <1){
                ips.style.border = "1px solid red";
                ips_error.style.display = "block";
                ips.scrollIntoView();
                return false;
            }
            //ipk
            if(ipk.value > 4 || ipk.value <1){
                ipk.style.border = "1px solid red";
                ipk_error.style.display = "block";
                ipk.scrollIntoView();
                return false;
            }
            // min semester
            if(min_semester.value > 8 || min_semester.value <1 || min_semester.value >= max_semester.value){
                min_semester.style.border = "1px solid red";
                min_semester_error.style.display = "block";
                min_semester.scrollIntoView();
                return false;
            }
            //mak semester
            if(max_semester.value > 8 || max_semester.value <1 || min_semester.value >= max_semester.value){
                max_semester.style.border = "1px solid red";
                max_semester_error.style.display = "block";
                max_semester.scrollIntoView();
                return false;
            }
        }
        function awal_penawaran_Verify(){

        }
        function akhir_penawaran_Verify(){
            if(tgl_akhir_penawaran.value > tgl_awal_penawaran.value){
                tgl_akhir_penawaran.style.border = "1px solid silver";
                tgl_akhir_penawaran_error.style.display = "none";
                return true;
            }
        }
        function awal_pendaftaran_Verify(){
            if(tgl_awal_pendaftaran.value > tgl_awal_penawaran.value){
                tgl_awal_pendaftaran.style.border = "1px solid silver";
                tgl_awal_pendaftaran_error.style.display = "none";
                return true;
            }
        }
        function akhir_pendaftaran_Verify(){
            if(tgl_akhir_pendaftaran.value > tgl_awal_pendaftaran.value){
                tgl_akhir_pendaftaran.style.border = "1px solid silver";
                tgl_akhir_pendaftaran_error.style.display = "none";
                return true;
            }
        }
        function awal_verifikasi_Verify(){
            if(tgl_awal_verifikasi.value > tgl_awal_pendaftaran.value){
                tgl_awal_verifikasi.style.border = "1px solid silver";
                tgl_awal_verifikasi_error.style.display = "none";
                return true;
            }
        }
        function akhir_verifikasi_Verify(){
            if(tgl_akhir_verifikasi.value > tgl_akhir_pendaftaran.value){
                tgl_akhir_verifikasi.style.border = "1px solid silver";
                tgl_akhir_verifikasi_error.style.display = "none";
                return true;
            }
        }
        function awal_penetapan_Verify(){
            if(tgl_awal_penetapan.value > tgl_awal_verifikasi.value){
                tgl_awal_penetapan.style.border = "1px solid silver";
                tgl_awal_penetapan_error.style.display = "none";
                return true;
            }
        }
        function akhir_penetapan_Verify(){
            if(tgl_akhir_penetapan.value > tgl_awal_penetapan.value){
                tgl_akhir_penetapan.style.border = "1px solid silver";
                tgl_akhir_penetapan_error.style.display = "none";
                return true;
            }
        }
        function pengumuman_Verify(){
            if(tgl_pengumuman.value > tgl_akhir_penetapan.value  && tgl_akhir_penawaran.value > tgl_pengumuman.value){
                tgl_pengumuman.style.border = "1px solid silver";
                tgl_pengumuman_error.style.display = "none";
                tgl_pengumuman_error1.style.display = "none";
                return true;
            }
        }

        function ips_Verify(){
            if(ips.value <= 4 || ips.value >= 1){
                ips.style.border = "1px solid silver";
                ips_error.style.display = "none";
                return true;
            }
            
        }

        function ipk_Verify(){
            if(ipk.value <= 4 || ipk.value >= 1){
                ipk.style.border = "1px solid silver";
                ipk_error.style.display = "none";
                return true;
            }
        }

        function min_semester_Verify(){
            if(min_semester.value <= 8 || min_semester.value >= 1 && min_semester.value < max_semester.value){
                min_semester.style.border = "1px solid silver";
                min_semester_error.style.display = "none";
                return true;
            }
        }
        function max_semester_Verify(){
            if(max_semester.value <= 8 || max_semester.value >= 1 && min_semester.value < max_semester.value){
                max_semester.style.border = "1px solid silver";
                max_semester_error.style.display = "none";
                return true;
            }
        }
</script>
@endpush
@push('addon-script')
<script type="text/javascript">
    $(document).ready(function(){
            $("#value1").click(function(){
                $("#fakultas").hide();
                $("#kuota-total").show();
                $("#fkip").val(0);
                $("#fmipa").val(0);
                $("#fk").val(0);
                $("#fp").val(0);
                $("#ft").val(0);
                $("#fib").val(0);
                $("#feb").val(0);
                $("#fh").val(0);
                $("#fisip").val(0);
                $("#fsrd").val(0);
                $("#fkor").val(0);
            });
        });

        $(document).ready(function(){
            $("#value2").click(function(){
                $("#fakultas").show();
                $("#kuota-total").hide();
                $("#jml_kuota").val(0);
            });
        });
    
</script>
@endpush
@push('addon-script')
<script src='https://cdn.tiny.cloud/1/0uwdgf525pyf04gsx5l2p31w2vgbln2vgbmacloluf1pwt79/tinymce/5/tinymce.min.js'
    referrerpolicy="origin">
</script>
<script>
    tinymce.init({
      selector: '#deskripsi'
    });
</script>
@endpush
@push('addon-script')
<script type="text/javascript">
    var countPenilaian = 0;
        var myNamePenilaian = [];

        //menghapus penilaian
        function removeDataPenilaian(){
            var att = this.id;
            var ids = "#"+att;
            removeA(myNamePenilaian, att);
            document.getElementById("myCountPenilaian").value = myNamePenilaian;
            $(ids).remove();
        }
        
        //untuk menampilkan bobot menilaian
        function addPenilaian(){
            countPenilaian++;
            var cls = "penilaian"+countPenilaian;
            var clsName = "penilaian"+countPenilaian+"Bobot";
            //title-------------------------------------------
            var judul = document.createElement("h6");
            judul.innerHTML="Masukkan Kriteria";

            var span = document.createElement("span");
            span.setAttribute("aria-hidden","true");
            span.innerHTML="&times;";

            var button = document.createElement("button");
            button.setAttribute("class","close hapus-penilaian");
            button.setAttribute("type","button");
            button.setAttribute("id",cls);
            button.appendChild(span);

            var colButton = document.createElement("div");
            colButton.setAttribute("class","col-1");
            colButton.appendChild(button);

            var colJudul = document.createElement("div");
            colJudul.setAttribute("class","col");
            colJudul.appendChild(judul);

            var row1 = document.createElement("div");
            row1.setAttribute("class","row");
            row1.appendChild(colJudul);
            row1.appendChild(colButton);

            //nama krteria------------------------------------------------------------------------------

            var option = document.createElement("option");
            option.innerHTML="--pilih salah satu--";

            var select = document.createElement("select");
            select.setAttribute("class","form-control custom-select fstdropdown-select");
            select.setAttribute("name", cls);
            select.setAttribute("id", cls);
            select.setAttribute("required","");
            select.appendChild(option);
            kriteria(select);

            var divcol1 = document.createElement("div");
            divcol1.setAttribute("class","col form-group");
            divcol1.appendChild(select);

            var row2 = document.createElement("div");
            row2.setAttribute("class","row");
            row2.appendChild(divcol1);

            // masukan bobot------------------------------------------------------------------------------
            var labelNama = document.createElement("label");
            labelNama.setAttribute("for",clsName);
            labelNama.innerHTML="Masukan Bobot";

            var inputNama = document.createElement("input");
            inputNama.setAttribute("class","form-control");
            inputNama.setAttribute("type","number");
            inputNama.setAttribute("placeholder","masukan bobot nilai 0-100");
            inputNama.setAttribute("name",clsName);
            inputNama.setAttribute("required","");

            var colNama = document.createElement("div");
            colNama.setAttribute("class","col form-group");
            colNama.appendChild(labelNama);
            colNama.appendChild(inputNama);

            var row3 = document.createElement("div");
            row3.setAttribute("class","row");
            row3.appendChild(colNama);
            
            var divr = document.createElement("div");
            divr.setAttribute("class","container card p-3 mb-3");
            divr.setAttribute("id",cls);
            divr.appendChild(row1);
            divr.appendChild(row2);
            divr.appendChild(row3);

            document.getElementById("form-penilaian").appendChild(divr);
            myNamePenilaian.push(cls);
            document.getElementById("myCountPenilaian").value = myNamePenilaian;
            $( ".hapus-penilaian" ).on( "click", removeDataPenilaian );
        }

        $( ".btn-penilaian" ).on( "click", addPenilaian);
        

        //function remove element by value
        function removeA(arr) {
            var what, a = arguments, L = a.length, ax;
            while (L > 1 && arr.length) {
                what = a[--L];
                while ((ax= arr.indexOf(what)) !== -1) {
                    arr.splice(ax, 1);
                }
            }
            return arr;
        }

        function kriteria(select){
            var i = 0;
            var refkriteria = <?php echo json_encode($kriteria); ?>;
            for(; i < refkriteria.length ; i++){
                var option = document.createElement("option");
                option.setAttribute("value", refkriteria[i]['nama_kriteria']);
                option.innerHTML=refkriteria[i]['nama_kriteria'];
                select.appendChild(option);
            }
        }
</script>
@endpush
@push('addon-script')
<script type="text/javascript">
    //penawaran upload
    var count = 0;
    var myName = [];

    //pendaftar upload
    var countPendaftar = 0;
    var myNamePendaftar = [];
    
    //menghapus lampiran pendaftar
    function removeDataPendaftar(){
        var att = this.id;
        var ids = "#"+att;
        removeA(myNamePendaftar, att);
        document.getElementById("myCountPendaftar").value = myNamePendaftar;
        $(ids).remove();
    }

    //menghapus lampiran
    function removeData(){
        var att = this.id;
        var ids = "#"+att;
        removeA(myName, att);
        document.getElementById("myCount").value = myName;
        $(ids).remove();
    }
    
    //untuk menampilkan lampiran yang dibutuhkan pendaftar
    function addLampiranPendaftar(){
        countPendaftar++;
        var cls = "lampiranPendaftar"+countPendaftar;
        //title-------------------------------------------
        var judul = document.createElement("h6");
        judul.innerHTML="Masukkan lampiran";

        var span = document.createElement("span");
        span.setAttribute("aria-hidden","true");
        span.innerHTML="&times;";

        var button = document.createElement("button");
        button.setAttribute("class","close hapus");
        button.setAttribute("type","button");
        button.setAttribute("id",cls);
        button.appendChild(span);

        var colButton = document.createElement("div");
        colButton.setAttribute("class","col-1");
        colButton.appendChild(button);

        var colJudul = document.createElement("div");
        colJudul.setAttribute("class","col");
        colJudul.appendChild(judul);

        var row1 = document.createElement("div");
        row1.setAttribute("class","row");
        row1.appendChild(colJudul);
        row1.appendChild(colButton);

        //nama lampiran------------------------------------------------------------------------------

        var option = document.createElement("option");
        option.innerHTML="--pilih salah satu--";

        var select = document.createElement("select");
        select.setAttribute("class","form-control custom-select fstdropdown-select");
        select.setAttribute("name", cls);
        select.setAttribute("id", cls);
        select.setAttribute("required","");
        select.appendChild(option);
        referencePendaftar(select);

        var divcol1 = document.createElement("div");
        divcol1.setAttribute("class","col form-group");
        divcol1.appendChild(select);

        var row2 = document.createElement("div");
        row2.setAttribute("class","row");
        row2.appendChild(divcol1);

        var divr = document.createElement("div");
        divr.setAttribute("class","container card p-3 mb-3");
        divr.setAttribute("id",cls);
        divr.appendChild(row1);
        divr.appendChild(row2);

        document.getElementById("lampiran-pendaftar").appendChild(divr);
        myNamePendaftar.push(cls);
        document.getElementById("myCountPendaftar").value = myNamePendaftar;
        $( ".hapus" ).on( "click", removeDataPendaftar );
    }   

    function addLampiran(){
        count++;
        var clsSelect = "lampiran"+count;
        var clsUpload = "lampiran"+count+"Upload";
        var clsName = "lampiran"+count+"Name";
        var clsDeskripsi = "lampiran"+count+"Deskripsi";
        
        //title-------------------------------------------
        var judul = document.createElement("h6");
        judul.innerHTML="Masukkan lampiran"

        var span = document.createElement("span");
        span.setAttribute("aria-hidden","true");
        span.innerHTML="&times;";

        var button = document.createElement("button");
        button.setAttribute("class","close delete");
        button.setAttribute("type","button");
        button.setAttribute("id",clsSelect);
        button.appendChild(span);

        var colButton = document.createElement("div");
        colButton.setAttribute("class","col-1");
        colButton.appendChild(button);

        var colJudul = document.createElement("div");
        colJudul.setAttribute("class","col");
        colJudul.appendChild(judul);

        var row1 = document.createElement("div");
        row1.setAttribute("class","row");
        row1.appendChild(colJudul);
        row1.appendChild(colButton);


        //nama lampiran------------------------------------------------------------------------------
        var labelOption = document.createElement("label");
        labelOption.setAttribute("for",clsSelect);
        labelOption.innerHTML="Nama lampiran";

        var option = document.createElement("option");
        option.innerHTML="--pilih salah satu--";

        var select = document.createElement("select");
        select.setAttribute("class","form-control custom-select fstdropdown-select");
        select.setAttribute("name", clsSelect);
        select.setAttribute("id", clsSelect);
        select.setAttribute("required","");
        select.appendChild(option);
        reference(select);

        var divcol1 = document.createElement("div");
        divcol1.setAttribute("class","col form-group");
        divcol1.appendChild(labelOption);
        divcol1.appendChild(select);

        var row2 = document.createElement("div");
        row2.setAttribute("class","row");
        row2.appendChild(divcol1);

        // upload file------------------------------------------------------------------------------
        var upload = document.createElement("input");
        upload.setAttribute("type","file");
        upload.setAttribute("name",clsUpload);
        upload.setAttribute("id",clsUpload);
        upload.setAttribute("required","");
        upload.setAttribute("placeholder","upload lampiran");
        upload.setAttribute("class","form-control-file");

        var labelUpload = document.createElement("label");
        labelUpload.innerHTML="pilih file";
        
        var divcol2 = document.createElement("div");
        divcol2.setAttribute("class","col form-group");
        divcol2.appendChild(labelUpload);
        divcol2.appendChild(upload);

        var row3 = document.createElement("row");
        row3.setAttribute("class","row");
        row3.appendChild(divcol2);
        
        // upload sebagai------------------------------------------------------------------------------
        var labelNama = document.createElement("label");
        labelNama.setAttribute("for",clsName);
        labelNama.innerHTML="upload sebagai";

        var inputNama = document.createElement("input");
        inputNama.setAttribute("class","form-control");
        inputNama.setAttribute("type","text");
        inputNama.setAttribute("placeholder","nama file");
        inputNama.setAttribute("name",clsName);
        inputNama.setAttribute("required","");

        var colNama = document.createElement("div");
        colNama.setAttribute("class","col form-group");
        colNama.appendChild(labelNama);
        colNama.appendChild(inputNama);

        var row4 = document.createElement("div");
        row4.setAttribute("class","row");
        row4.appendChild(colNama);

        //deskripsi------------------------------------------
        var labelDeskripsi = document.createElement("label");
        labelDeskripsi.setAttribute("for","deskripsi");
        labelDeskripsi.innerHTML="Deskripsi";

        var textDeskripsi = document.createElement("textarea");
        textDeskripsi.setAttribute("type","text");
        textDeskripsi.setAttribute("class","form-control");
        textDeskripsi.setAttribute("placeholder","Tulis deskripsi file");
        textDeskripsi.setAttribute("rows","5");
        textDeskripsi.setAttribute("name",clsDeskripsi);

        var colDeskripsi = document.createElement("div");
        colDeskripsi.setAttribute("class","col form-group");
        colDeskripsi.appendChild(labelDeskripsi);
        colDeskripsi.appendChild(textDeskripsi);

        var row5 = document.createElement("div");
        row5.setAttribute("class","row");
        row5.appendChild(colDeskripsi);
        
        var garis = document.createElement("hr");
        
        //container
        var divr = document.createElement("div");
        divr.setAttribute("class","container card p-3 mb-3");
        divr.setAttribute("id",clsSelect);
        divr.appendChild(row1);
        divr.appendChild(garis);
        divr.appendChild(row2);
        divr.appendChild(row3);
        divr.appendChild(row4);
        divr.appendChild(row5);

        document.getElementById("form-lampiran").appendChild(divr);
        myName.push(clsSelect);
        document.getElementById("myCount").value = myName;
        $( ".delete" ).on( "click", removeData );
    }

    $( ".click" ).on( "click", addLampiran);
    $( ".tambah-lampiran-pendaftar" ).on( "click", addLampiranPendaftar);
    

    //function remove element by value
    function removeA(arr) {
        var what, a = arguments, L = a.length, ax;
        while (L > 1 && arr.length) {
            what = a[--L];
            while ((ax= arr.indexOf(what)) !== -1) {
                arr.splice(ax, 1);
            }
        }
        return arr;
    }

    

    function reference(select){
        var i = 0;
        var reflampiran = <?php echo json_encode($lampiran); ?>;
        for(; i < reflampiran.length ; i++){
            var option = document.createElement("option");
            option.setAttribute("value", reflampiran[i]['id_jenis_file']);
            option.innerHTML=reflampiran[i]['nama_jenis_file'];
            select.appendChild(option);
        }
    }
    function referencePendaftar(select){
        var i = 0;
        var reflampiran = <?php echo json_encode($lampiranPendaftar); ?>;
        for(; i < reflampiran.length ; i++){
            var option = document.createElement("option");
            option.setAttribute("value", reflampiran[i]['id_jenis_file']);
            option.innerHTML=reflampiran[i]['nama_jenis_file'];
            select.appendChild(option);
        }
    }
        
</script>
@endpush