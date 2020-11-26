@extends('layouts.adminuniv')
@section('title', 'Tambah Penawaran')
@section('content')
    <div class="container col-10 mb-5 mt-5">
        <h1>Nominasi Kuota Beasiswa</h1>
        <form method="post" action="/adminuniversitas" enctype="multipart/form-data" data-parsley-validate id="form-penawaran">
            @csrf
         
           {{-- jenis penawaran beasiswa --}}
            <div class="form-group">
                <label for="id_penawaran">Jenis Penawaran Beasiswa</label>
                <select class="custom-select " 
                    name="id_penawaran" id="id_penawaran" 
                    value="{{old('id_penawaran')}}" 
                    required data-parsley-trigger="keyup">
                    <option value="" disabled selected>--Pilih salah satu--</option>
                    @foreach ($jenisPenawaran as $item)
                        <option value="{{$item->id_penawaran}}" {{old("id_penawaran") == $item->id_penawaran ? "selected":"" }}>{{$item->nama_penawaran}}</option>
                    @endforeach
                </select>
            </div>
            

            <button type="submit" class="btn btn-primary">Tambah Data</button>
            <a href="/adminuniversitas" class="btn btn-outline-warning">Batal</a>


        </form>
    </div>
@endsection


