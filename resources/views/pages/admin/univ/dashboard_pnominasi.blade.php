@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-dashboard', 'active')
@section('content')

<div class="container">
    <h1>Daftar Penetapan Lolos Seleksi Beasiswa</h1>
    {{-- succes --}}
    <div class="mt-2">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        @endif
    </div>

    <table class="table table-striped table-bordered">

            <!DOCTYPE html>
            <html>

            <body>

            <div class="container">


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

       <!--      </br><button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                    IMPORT EXCEL
                </button>

                 Import Excel -->
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="/pnominasis/import_excel" enctype="multipart/form-data">
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
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="table table-striped table-bordered">
                    <thead class="bg-primary text-white" >
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Id Pendaftar</th>
                            <th scope="col">Id Penawaran</th>
                            <th scope="col">NIM</th>
                            <th scope="col">IPS</th>
                            <th scope="col">IPK</th>
                            <th scope="col">Penghasilan</th>
                            <th scope="col">Semester</th>
<!--                             <th scope="col">Prodi</th>
                            <th scope="col">Fakultas</th> -->
                        </tr>
                    </thead>

                    <tbody>
                        @php $i=1 @endphp
                        @foreach($dashboard_pnominasi as $pn)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <td>{{$pn->id_pendaftar}}</td>
                            <td>{{$pn->id_penawaran}}</td>
                            <td>{{$pn->nim}}</td>
                            <td>{{$pn->ips}}</td>
                            <td>{{$pn->ipk}}</td>
                            <td>{{$pn->penghasilan}}</td>
                            <td>{{$pn->semester}}</td>
    <!--                         <td>{{$pn->prodi}}</td>
                            <td>{{$pn->fakultas}}</td> -->
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
