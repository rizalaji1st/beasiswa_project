@extends('layouts.pendaftar')
@section('title', 'Pendaftaran Beasiswa')
@section('status-dashboard', 'active')
@section('content')
<div class="container-fluid">
    <div class="col-lg-6"></div>
    <div class="col-lg-6">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Beasiswa</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Beasiswa</h6>
            </div>
            <div class="card-body">
                <form class="user">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" class="form-control" id="nim" placeholder="Masukan NIM..">
                    </div>
                    <div class="form-group">
                        <label for="ips">Index Prestasi Semester</label>
                        <input type="text" name="ips" class="form-control" id="ips" placeholder="Masukan ips..">
                    </div>
                    <div class="form-group">
                        <label for="ipk">Index Prestasi Komulatif</label>
                        <input type="text" name="ipk" class="form-control" id="ipk" placeholder="Masukan ipk..">
                    </div>
                    <div class="form-group">
                        <label for="penghasilan">Penghasilan Orang Tua</label>
                        <select class="form-control" id="penghasilan">
                            <option>Tidak Berpenghasilan</option>
                            <option>
                                Kurang dari Rp. 250.000</option>
                            <option>Rp. 250.001 - Rp. 500.000
                            </option>
                            <option>Rp. 500.001 - Rp. 750.000</option>
                            <option>Rp. 750.001 - Rp. 1.000.000</option>
                            <option>Rp. 1.000.001 - Rp. 1.250.000</option>
                            <option>Rp. 1.250.001 - Rp. 1.500.000</option>
                            <option>Rp. 1.500.001 - Rp. 1.750.000</option>
                            <option>Rp. 1.750.001 - Rp. 2.000.000</option>
                            <option>Rp. 2.000.001 - Rp. 2.250.000</option>
                            <option>Rp. 2.250.001 - Rp. 2.500.000</option>
                            <option></option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ayah">Status Ayah</label>
                        <select class="form-control" id="ayah">
                            <option>Hidup</option>
                            <option>Bercerai</option>
                            <option>Wafat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ibu">Status Ibu</label>
                        <select class="form-control" id="ibu">
                            <option>Hidup</option>
                            <option>Bercerai</option>
                            <option>Wafat
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rumah">Status Rumah</label>
                        <select class="form-control" id="rumah">
                            <option>Sendiri</option>
                            <option>Menumpang</option>
                            <option>Menumpang Tanpa Izin</option>
                            <option>Sewa Tahunan</option>
                            <option>Sewa Bulanan</option>
                            <option>Tidak Memiliki</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pend-ayah">Pendidikan Ayah</label>
                        <select class="form-control" id="pend-ayah">
                            <option>Tidak Sekolah</option>
                            <option>SD/MI/Sederajat</option>
                            <option>SMP/MTs/Sederajat</option>
                            <option>SMA/MA/Sederajat</option>
                            <option>D1/Sederajat</option>
                            <option>D2/Sederajat</option>
                            <option>D3/Sederajat</option>
                            <option>D4/S1/Sederajat</option>
                            <option>S2/Sp1/Sederajat</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pend-ibu">Pendidikan Ibu</label>
                        <select class="form-control" id="pend-ibu">
                            <option>Tidak Sekolah</option>
                            <option>SD/MI/Sederajat</option>
                            <option>SMP/MTs/Sederajat</option>
                            <option>SMA/MA/Sederajat</option>
                            <option>D1/Sederajat</option>
                            <option>D2/Sederajat</option>
                            <option>D3/Sederajat</option>
                            <option>D4/S1/Sederajat</option>
                            <option>S2/Sp1/Sederajat</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pek-ayah">Pekerjaan Ayah</label>
                        <select class="form-control" id="pek-ayah">
                            <option>Tidak Bekerja</option>
                            <option>Lainnya</option>
                            <option>Petani</option>
                            <option>Wirausaha</option>
                            <option>Pegawai Swasta</option>
                            <option>PNS</option>
                            <option>TNI/POLRI</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pek-ibu">Pekerjaan Ibu</label>
                        <select class="form-control" id="pek-ibu">
                            <option>Tidak Bekerja</option>
                            <option>Lainnya</option>
                            <option>Petani</option>
                            <option>Wirausaha</option>
                            <option>Pegawai Swasta</option>
                            <option>PNS</option>
                            <option>TNI/POLRI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggungan">Jumlah Tanggungan</label>
                        <select class="form-control" id="tanggungan">
                            <option>0</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <select class="form-control" id="semester">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                        </select>
                    </div>
                    @foreach ($Penawaran->lampiranPendaftar as $lamp)
                    <div class="custom-file mb-3">
                        <input type="file" name="files[]" class="custom-file-input" id="file" required>
                        <label class="custom-file-label" for="file">Upload
                            {{$lamp->refJenisFile->nama_jenis_file}}...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                    @endforeach
            </div>
            <a href="index.html" class="btn btn-primary btn-user btn-block">
                Kirim
            </a>
            </form>
        </div>
    </div>
</div>
@endsection