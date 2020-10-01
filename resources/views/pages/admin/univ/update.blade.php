@extends('layouts.adminuniv')
@section('title', 'Ubah Penawaran')
@section('content')
    <div class="container col-10 mb-5 mt-5">
        <h1>Ubah Penawaran Beasiswa</h1>
        <h3 class="mt-5 mb-3">Informasi Umum</h3>
        <form method="post" action="/adminuniversitas/{{$adminuniv->id_penawaran}}" enctype="multipart/form-data">
            @method('patch')
            @csrf
            {{-- nama penawaran --}}
            <div class="form-group">
                <label for="nama_penawaran">Nama Penawaran</label>
                <input type="nama_penawaran" class="form-control @error('nama_penawaran') is-invalid @enderror" id="nama_penawaran" name="nama_penawaran" placeholder="masukkan nama penawaran" value="{{$adminuniv->nama_penawaran}}">
                @error('nama_penawaran')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            {{-- jenis penawaran beasiswa --}}
            <div class="form-group">
                <label for="jenis_beasiswa">Jenis Beasiswa</label>
                <select class="custom-select fstdropdown-select" name="id_jenis_beasiswa" id="id_jenis_beasiswa">
                    @foreach ($jenisBeasiswa as $item)
                    <option value="{{$item->id_jenis_beasiswa}}" 
                        {{$item->id_jenis_beasiswa == $adminuniv->refJenisPenawaran->id_jenis_beasiswa ? 'selected' : ''}}
                        >{{$item->nama_beasiswa}}</option>
                    @endforeach
                </select>
            </div>
            {{-- konfigurasi kuota --}}
            <div class="form-group">
                <label for="kuota_fakultas">Konfigurasi Kuota Penerima Beasiswa</label>
                <div class="custom-control custom-radio">
                    <input type="radio" id="value1" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="value1" value="value1">Abaikan Asal Fakultas</label>
                    <p style="color: #bdbdbd; font-size:14px;">Asal fakultas tidak akan berpengaruh terhadap Ketentuan seleksi</p>
                </div>

                {{-- kuota Total --}}
                <div class="form-group kuota-total" id="kuota-total" style="display: none">
                    <input type="number" class="form-control @error('jml_kuota') is-invalid @enderror" id="jml_kuota" name="jml_kuota"  placeholder="masukan jumlah kuota penerima" value="{{$adminuniv->jml_kuota}}">
                    <input type="text" class="form-control" id="is_total" name="is_total" hidden>
                    @error('jml_kuota')
                        <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="value2" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="value2" value="value2">Tentukan kuota Perfakultas</label>
                    <p style="color: #bdbdbd; font-size:14px;">Jumlah pendaftar yang diterima berdasarkan kuota masing-masing fakultas</p>
                </div>
                <br>
                <div class="form-group fakultas" id="fakultas" style="display: none">
                    @forelse ($adminuniv->getKuotaFakultas as $item)
                        <div class="form-group row">
                            <label for="{{$item->id_fakultas}}" class="col-sm-6 col-form-label">Fakultas {{$item->refFakultas->nama_fakultas}}</label>
                            <div class="col-sm-6">
                                <input name="fakultas{{$item->id_fakultas}}" type="number" placeholder="masukkan kuota" class="form-control" id="{{$item->id_fakultas}}" value="{{$item->jml_kuota}}">
                            </div>
                        </div>
                    @empty
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input name="is_fakultas" type="text" class="form-control" id="is_fakultas" hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fkip" class="col-sm-6 col-form-label">Fakultas Keguruan dan Ilmu Pendidikan</label>
                            <div class="col-sm-6">
                                <input name="fkip" type="number" placeholder="masukkan kuota" class="form-control" id="fkip">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fmipa" class="col-sm-6 col-form-label">Fakultas Matematika dan Ilmu Alam</label>
                            <div class="col-sm-6">
                                <input name="fmipa" type="number" placeholder="masukkan kuota" class="form-control" id="fmipa">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fk" class="col-sm-6 col-form-label">Fakultas Kedokteran</label>
                            <div class="col-sm-6">
                                <input name="fk" type="number" placeholder="masukkan kuota" class="form-control" id="fk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fp" class="col-sm-6 col-form-label">Fakultas Pertanian</label>
                            <div class="col-sm-6">
                                <input name="fp" type="number" placeholder="masukkan kuota" class="form-control" id="fp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ft" class="col-sm-6 col-form-label">Fakultas Teknik</label>
                            <div class="col-sm-6">
                                <input name="ft" type="number" placeholder="masukkan kuota" class="form-control" id="ft">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fib" class="col-sm-6 col-form-label">Fakultas Ilmu Budaya</label>
                            <div class="col-sm-6">
                                <input name="fib" type="number" placeholder="masukkan kuota" class="form-control" id="fib">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="feb" class="col-sm-6 col-form-label">Fakultas Ekonomi Bisnis</label>
                            <div class="col-sm-6">
                                <input name="feb" type="number" placeholder="masukkan kuota" class="form-control" id="feb">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fh" class="col-sm-6 col-form-label">Fakultas Hukum</label>
                            <div class="col-sm-6">
                                <input name="fh" type="number" placeholder="masukkan kuota" class="form-control" id="fh">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fsrd" class="col-sm-6 col-form-label">Fakultas Seni Rupa dan Desain</label>
                            <div class="col-sm-6">
                                <input name="fsrd" type="number" placeholder="masukkan kuota" class="form-control" id="fsrd">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fisip" class="col-sm-6 col-form-label">Fakultas Ilmu Sosial dan Politik</label>
                            <div class="col-sm-6">
                                <input name="fisip" type="number" placeholder="masukkan kuota" class="form-control" id="fisip">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fkor" class="col-sm-6 col-form-label">Fakultas Keolahragaan</label>
                            <div class="col-sm-6">
                                <input name="fkor" type="number" placeholder="masukkan kuota" class="form-control" id="fkor">
                            </div>
                        </div>
                    @endforelse
                </div>  
            </div>

            <h3 class="mt-5 mb-4">Timeline</h3>
            {{-- Penawaran --}}
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tgl_awal_penawaran">Awal Penawaran</label>
                        <input type="date" class="form-control @error('tgl_awal_penawaran') is-invalid @enderror" id="tgl_awal_penawaran" name="tgl_awal_penawaran" value="{{$adminuniv->tgl_awal_penawaran->format('Y-m-d')}}">
                            @error('tgl_awal_penawaran')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tgl_akhir_penawaran">Akhir Penawaran</label>
                            <input type="date" class="form-control @error('tgl_akhir_penawaran') is-invalid @enderror" id="tgl_akhir_penawaran" name="tgl_akhir_penawaran" value="{{$adminuniv->tgl_akhir_penawaran->format('Y-m-d')}}">
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
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tgl_awal_pendaftaran">Awal Pendaftaran</label>
                            <input type="date" class="form-control @error('tgl_awal_pendaftaran') is-invalid @enderror" id="tgl_awal_pendaftaran" name="tgl_awal_pendaftaran" value="{{$adminuniv->tgl_awal_pendaftaran->format('Y-m-d')}}">
                            @error('tgl_awal_pendaftaran')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tgl_akhir_pendaftaran">Akhir Pendaftaran</label>
                            <input type="date" class="form-control @error('tgl_akhir_pendaftaran') is-invalid @enderror" id="tgl_akhir_pendaftaran" name="tgl_akhir_pendaftaran" value="{{$adminuniv->tgl_akhir_pendaftaran->format('Y-m-d')}}">
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
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tgl_awal_verifikasi">Awal Verifikasi</label>
                            <input type="date" class="form-control @error('tgl_awal_verifikasi') is-invalid @enderror" id="tgl_awal_verifikasi" name="tgl_awal_verifikasi" value="{{$adminuniv->tgl_awal_verifikasi->format('Y-m-d')}}">
                            @error('tgl_awal_verifikasi')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tgl_akhir_verifikasi">Akhir Verifikasi</label>
                            <input type="date" class="form-control @error('tgl_akhir_verifikasi') is-invalid @enderror" id="tgl_akhir_verifikasi" name="tgl_akhir_verifikasi" value="{{$adminuniv->tgl_akhir_verifikasi->format('Y-m-d')}}">
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
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tgl_awal_penetapan">Awal penetapan</label>
                            <input type="date" class="form-control @error('tgl_awal_penetapan') is-invalid @enderror" id="tgl_awal_penetapan" name="tgl_awal_penetapan" value="{{$adminuniv->tgl_awal_penetapan->format('Y-m-d')}}">
                            @error('tgl_awal_penetapan')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tgl_akhir_penetapan">Akhir Penetapan</label>
                            <input type="date" class="form-control @error('tgl_akhir_penetapan') is-invalid @enderror" id="tgl_akhir_penetapan" name="tgl_akhir_penetapan" value="{{$adminuniv->tgl_akhir_penetapan->format('Y-m-d')}}">
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
                <input type="date" class="form-control @error('tgl_pengumuman') is-invalid @enderror" id="tgl_pengumuman" name="tgl_pengumuman" value="{{$adminuniv->tgl_pengumuman->format('Y-m-d')}}">
                @error('tgl_pengumuman')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <h4 class="mt-5 mb-3">Ketentuan</h4>
            <div class="form-group">
                <label for="ips">Indek Prestasi Semester</label>
                <input type="number" step="0.01" class="form-control @error('ips') is-invalid @enderror" placeholder="masukkan ips" id="ips" name="ips" value="{{$adminuniv->ips}}">
                @error('ips')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="ipk">Indek Prestasi Komulatif</label>
                <input type="number" step="0.01" class="form-control @error('ipk') is-invalid @enderror" placeholder="masukkan ipk" id="ipk" name="ipk" value="{{$adminuniv->ipk}}">
                @error('ipk')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Semester --}}
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="min_semester">Minimal Semester</label>
                            <input type="number" class="form-control @error('min_semester') is-invalid @enderror" placeholder="masukkan minimal semester" id="min_semester" name="min_semester" value="{{$adminuniv->min_semester}}">
                            @error('min_semester')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="max_semester">Maksimal Semester</label>
                            <input type="number" class="form-control @error('max_semester') is-invalid @enderror" placeholder="masukkan maksimal semester" id="max_semester" name="max_semester" value="{{$adminuniv->max_semester}}">
                            @error('max_semester')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- maksimal penghasilan --}}
            <div class="form-group">
                <label for="max_penghasilan">Maksimal Penghasilan</label>
                <input type="number" step="0.01" class="form-control @error('max_penghasilan') is-invalid @enderror" id="max_penghasilan" placeholder="masukkan maksimal penghasilan" name="max_penghasilan" value="{{$adminuniv->max_penghasilan}}" >
                @error('max_penghasilan')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- deskripsi --}}
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
            <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Tulis Deskripsi Beasiswa" rows="5" name="deskripsi" >{{$adminuniv->deskripsi}}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            {{-- lampiran --}}
            <div class="form-group" id="form-lampiran">
                <label for="lampiran">Lampiran</label>
                @foreach ($adminuniv->penawaranUpload as $lampiran)
                <div class="container card p-3 mb-3" id="lampiran{{$loop->iteration}}">
                    <div class="row">
                        <div class="col">
                            <h6>Masukkan Lampiran</h6>
                        </div>
                        <div class="col-1">
                            <button class="close delete" type="button" id="lampiran{{$loop->iteration}}">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col form-group">
                            <label for="lampiran{{$loop->iteration}}">Nama Lampiran</label>
                            <select name="lampiran{{$loop->iteration}}" id="" class="form-control custom-select fstdropdown">
                                <option value="">--pilih salah satu--</option>
                                @foreach ($refJenisFile as $item)
                                    <option value="{{$item->id_jenis_file}}" 
                                        {{$item->id_jenis_file == $lampiran->id_jenis_file ? 'selected' : ''}}
                                        >{{$item->nama_jenis_file}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label>Pilih File</label>
                            <input type="file" name="lampiran{{$loop->iteration}}Upload" id="lampiran{{$loop->iteration}}Upload" class="form-control-file" value="{{$lampiran->path_file}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="lampiran{{$loop->iteration}}Name">Upload sebagai</label>
                            <input type="text" class="form-control" placeholder="nama file" name="lampiran{{$loop->iteration}}Name" required value="{{$lampiran->nama_upload}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="lampiran{{$loop->iteration}}Deskripsi" rows="5" required placeholder="tulis deskripsi file">{{$lampiran->deskripsi}}</textarea>
                        </div>
                    </div>
                </div>

                
                <input type="text" name="dmyCount" id="dmyCount"  value="{{$loop->iteration}}" hidden>
                @endforeach
            </div>

            <button  type="button" class="btn btn-secondary click"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</button>
            
            <div class="form-group">
                <input type="text" name="myCount" id="myCount" hidden>
            </div>
            
            <a href="/adminuniversitas/{{$adminuniv->id_penawaran}}" class="btn btn-outline-warning">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

@endsection

@push('addon-script')
    <script type="text/javascript">
        
        $(document).ready(function(){
            var i = $("#1").val();
            if( i == undefined){
                $("#value1").prop('checked', true);
                $("#fakultas").hide();
                $("#kuota-total").show();

            } else if(i >= 0){
                $("#value2").prop('checked', true);
                $("#fakultas").show();
                $("#kuota-total").hide();
            };

            $("#value1").click(function(){
                $("#fakultas").hide();
                $("#is_total").val("true");
                $("#kuota-total").show();
            });
            $("#value2").click(function(){
                $("#fakultas").show();
                $("#is_fakultas").val("true");
                $("#kuota-total").hide();
            });
        });
    </script>
@endpush
@push('addon-script')
    <script src='https://cdn.tiny.cloud/1/0uwdgf525pyf04gsx5l2p31w2vgbln2vgbmacloluf1pwt79/tinymce/5/tinymce.min.js' referrerpolicy="origin">
  </script>
  <script>
    tinymce.init({
      selector: '#deskripsi'
    });
  </script>
@endpush
@push('addon-script')
        <script type="text/javascript">

        var count = 0;
        var myName = [];

        //memnghapus lampiran
        function removeData(){
            var att = this.id;
            var ids = "#"+att;
            removeA(myName, att);
            document.getElementById("myCount").value = myName;
            $(ids).remove();
        }

        //menambahkan lampiran
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
            option.innerHTML="pilih salah satu";

            var select = document.createElement("select");
            select.setAttribute("class","form-control custom-select fstdropdown");
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
            console.log(clsUpload);
            upload.setAttribute("id",clsUpload);
            upload.setAttribute("required","");
            upload.setAttribute("placeholder","upload lampiran");
            upload.setAttribute("class","form-control-file @error('".clsUpload."') is-invalid @enderror");

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
            textDeskripsi.setAttribute("required","");

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
    
        $( ".click" ).on( "click", addLampiran );
        $( ".delete" ).on( "click", removeData );
        

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
        
    </script>
@endpush