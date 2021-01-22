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
    
        <div class="container">
<div class="text-center"><h2>Daftar Lolos Seleksi Beasiswa</h2>
<table class='table table-bordered'>
<div class="text-right">
<!-- <a href=""  class="btn btn-primary" target="_blank">CETAK PDF</a> -->
        <table class='table table-bordered'>
        <div class="text-right">
        
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th scope="col">No</th>
                            <td scope="col">Prodi</td>
<<<<<<< HEAD
                            <td scope="col">NIM</td>
                            <td scope="col">Nama</td>
=======
                            <td scope="col">Fakultas</td>
                            <td scope="col">NIM</td>
                            <td scope="col">Nama</td>
                            <td scope="col">Semester</td>
>>>>>>> c055ac4e7041826aa436f939458d3cbabac13897
                            </tr>
                    </tbody>
                    <tbody>
                    @foreach ($lolos as $n)
                    <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                        <td scope="col" class="text-center">{{$n->nama_prodi}}</td>
<<<<<<< HEAD
                        <td scope="col" class="text-center">{{$n->nim}}</td>
                        <td scope="col" class="text-center">{{$n->nama}}</td>
=======
                        <td scope="col" class="text-center">{{$n->nama_fakultas}}</td>
                        <td scope="col" class="text-center">{{$n->nim}}</td>
                        <td scope="col" class="text-center">{{$n->nama}}</td>
                        <td scope="col" class="text-center">{{$n->semester}}</td>
                        <td scope="col" class="text-center">
                        <a href="{{route('admin.penetapan.index')}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            @method('Delete')
                            @csrf
>>>>>>> c055ac4e7041826aa436f939458d3cbabac13897
                        </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-right">
                <a href="{{route('admin.penetapan.index')}}" class="btn btn-outline-warning">kembali</a> 
            </div>
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