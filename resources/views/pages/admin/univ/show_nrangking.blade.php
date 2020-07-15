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
<h3 class="mt-2 mb-2">Informasi Umum</h3>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td scope="col">Id Pendaftar</td>
                            <td scope="col">Id Penawaran</td>
                            <td scope="col">NIM</td>
                            <td scope="col">IPS</td>
                            <td scope="col">IPK</td>
                            <td scope="col">Penghasilan</td>
                            <td scope="col">Semester</td>
                            </tr>
                                                    
                        <tr>
                            <td scope="col">{{$nrangking->id_pendaftar}}</td>
                            <td scope="col">{{$nrangking->id_penawaran}}</td>
                            <td scope="col">{{$nrangking->nim}}</td>
                            <td scope="col">{{$nrangking->ips}}</td>
                            <td scope="col">{{$nrangking->ipk}}</td>
                            <td scope="col">{{$nrangking->penghasilan}}</td>
                            <td scope="col">{{$nrangking->semester}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        

        {{-- button --}}
        
        <form action="{{$nrangking}}" method="POST"class="d-inline">
            @method('put')
            @csrf
            <button type="submit" class="btn btn-primary pull-right d-inline">Edit</button>
        </form>
        <form action="{{$nrangking}}" method="POST" class="d-inline">
            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure ?')">Delete</button>
            @method('Delete')
            @csrf
        </form>
        <a href="/adminuniversitas" class="btn btn-outline-warning">kembali</a>
    </div>
@endsection
