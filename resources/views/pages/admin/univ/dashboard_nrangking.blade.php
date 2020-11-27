@extends('layouts.adminuniv')
@section('title', 'Detail Beasiswa')
@section('status-dashboard', 'active')
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
<h3 class="mt-2 mb-2">DAFTAR MAHASISWA LOLOS BEASISWA</h3>
<a href="/nrangking/cetak_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
        <table class='table table-bordered'>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th scope="col">No</th>
                            <td scope="col">Id Pendaftar</td>
                            <td scope="col">NIM</td>
                            <td scope="col">Nama</td>
                            <td scope="col">Prodi</td>
                            <td scope="col">Fakultas</td>
                            <td scope="col">Skor</td>
                            <td scope="col">Action</td>
                        </tr>
                             
 
                              @foreach($nrank as $nrangking)                      
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td scope="col">{{$nrangking->id_pendaftar}}</td>
                            <td scope="col">{{$nrangking->nim}}</td>
                            <td scope="col">{{$nrangking->nama}}</td>
                            <td scope="col">{{$nrangking->nama_prodi}}</td>
                            <td scope="col">{{$nrangking->nama_fakultas}}</td>
                            <td scope="col"></td>
                            <td scope="col" ><a href="/nrangking/{{$nrangking->id_pendaftar}}" class="badge badge-info badge-pill">Detail Skor</a></td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
           
        </div>
        

        {{-- button --}}

         
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#beasiswa').DataTable();
        } );
    </script>
@endpush

