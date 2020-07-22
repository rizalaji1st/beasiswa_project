@extends('layouts.adminuniv')
@section('title', 'Ubah Penawaran')
@section('content')
    <div class="container col-6 mb-5 mt-5">
        <h1>Ubah Penawaran Beasiswa</h1>
        <h3 class="mt-5 mb-3">Informasi Umum</h3>
        <form method="post" action="/adminuniversitas/{{$adminuniv->id_penawaran}}">
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


            {{-- kuota --}}
            <div class="form-group">
                <label for="jml_kuota">Kuota</label>
                <input type="number" class="form-control @error('jml_kuota') is-invalid @enderror" id="jml_kuota" name="jml_kuota"  placeholder="masukan jumlah kuota" value="{{$adminuniv->jml_kuota}}">
                @error('jml_kuota')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- id jenis penawaran beasiswa
            <div class="form-group">
                <label for="id_jenis_beasiswa">Id Jenis beasiswa</label>
                <input type="number" class="form-control @error('id_jenis_beasiswa') is-invalid @enderror" id="id_jenis_beasiswa" name="id_jenis_beasiswa" value="{{$adminuniv->id_jenis_beasiswa}}">
                @error('id_jenis_penawaran')
                    <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}

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
                <div class="input-group mb-3 lampiran" id="dlampiran{{$loop->iteration}}">
                        <input class="form-control" 
                                id="dlampiran{{$loop->iteration}}"
                                type="text"
                                name="dlampiran{{$loop->iteration}}"
                                placeholder="tambahkan nama lampiran"
                                required
                                value="{{$lampiran->nama_upload}}">
                        <button class="btn delete"
                                type="button"
                                id="dlampiran{{$loop->iteration}}">
                                <i class="fa fa-minus-circle" id="dlampiran{{$loop->iteration}}"></i>
                        </button>
                        
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
        function addData(){
            count++;
            var cls = "lampiran"+count;

            var x = document.createElement("div");
            x.setAttribute("class", "input-group mb-3 lampiran");
            x.setAttribute("id",cls);
            
            var y = document.createElement("INPUT");
            y.setAttribute("class","form-control @error('lampiran') is-invalid @enderror");
            y.setAttribute("id",cls);
            y.setAttribute("type","text");
            y.setAttribute("name",cls);
            y.setAttribute("placeholder", "tambahkan nama lampiran");
            y.setAttribute('required',true);
            // y.setAttribute("required");
            x.appendChild(y);

            var z = document.createElement("button");
            z.setAttribute("class", "btn delete");
            z.setAttribute("type","button");
            z.setAttribute("id",cls)
            x.appendChild(z);

            var i = document.createElement("i");
            i.setAttribute("class","fa fa-minus-circle");
            i.setAttribute("id",cls);
            z.appendChild(i);

            document.getElementById("form-lampiran").appendChild(x);
            myName.push(cls);
            document.getElementById("myCount").value = myName;
            console.log(myName);
            $( ".delete" ).on( "click", removeData );
        }
    
        $( ".click" ).on( "click", addData );
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
        
    </script>
@endpush