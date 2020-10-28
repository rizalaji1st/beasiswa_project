@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-dashboard', 'active')
@section('content')

<div class="container">

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
                            <th scope="col">No</th>
                            <td scope="col">Id Pendaftar</td>
                            <td scope="col">Id Penawaran</td>
                            <td scope="col">NIM</td>
                            <td scope="col">IPS</td>
                            <td scope="col">IPK</td>
                            <td scope="col">Penghasilan</td>
                            <td scope="col">Semester</td>
                            </tr>


                              @foreach($nrank as $nrangking)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td scope="col">{{$nrangking['id_pendaftar']}}</td>
                            <td scope="col">{{$nrangking['id_penawaran']}}</td>
                            <td scope="col">{{$nrangking['nim']}}</td>
                            <td scope="col">{{$nrangking['ips']}}</td>
                            <td scope="col">{{$nrangking['ipk']}}</td>
                            <td scope="col">{{$nrangking['penghasilan']}}</td>
                            <td scope="col">{{$nrangking['semester']}}</td>

                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>


        {{-- button --}}



        <form action="{{$excel}" method="POST" class="d-inline">
            <a href="/nrangkings/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>

            @csrf
        </form>
        <a href="/nrangkings" class="btn btn-outline-warning">kembali</a>
    </div>
@endsection
@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#beasiswa').DataTable();
        } );
    </script>
@endpush

