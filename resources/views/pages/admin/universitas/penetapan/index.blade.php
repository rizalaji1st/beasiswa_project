@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-dashboard', 'active')
@section('content')

<div class="container">
<div class="text-center"><h1>Data Pendaftar Beasiswa</h1>
        <hr>
        <div class="text-center"><h7>Silahkan Import file excel yang sudah terupdate sesuai jenis beasiswa</h7>
        {{-- succes --}}
        <div class="mt-2">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
            @endif
        </div>
        {{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif
		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $sukses }}</strong>
		</div>
		@endif


        {{-- <ul class="list-group mt-2">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$bea->nama_penawaran}}
                <a href="/adminuniversitas/{{$bea->id_penawaran}}" class="badge badge-info badge-pill">detail</a>
            </li>
        </ul> --}}
        <table class="table table-striped table-bordered" id="beasiswa">
            <thead class="bg-primary text-white" >
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Beasiswa</th>
                <th scope="col">Daftar Beasiswa</th>
                <th scope="col">Penetapan Lolos</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($bea as $a)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td  scope="col" >{{$a->id_penawaran}}</td>
                <td  scope="col" >{{$a->nama_penawaran}}</td>
                <div class="text-center">
                <td><button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                    IMPORT EXCEL
                </button>
                <!-- Import Excel -->
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="/admin/import_excel" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5></br>
                                </div>
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    <label>Pilih file excel</label>
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" value="import" name="import">Import</button>
                                </div>
                            </div>
                            <td scope="col" class="text-center">
                    <a class="btn btn-primary" href="{{route('admin.penetapan.show',$a->id_penawaran)}}" > Lihat Hasil <i class="fa fa-arrow-right"></i></a>
                        </form>
                    </div>
                </div>
            </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection
    @push('addon-script')
        <script>
            $(document).ready(function() {
                $('#beasiswa').DataTable();
            } );
        </script>
    @endpush
