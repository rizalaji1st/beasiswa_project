@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-dashboard', 'active')
@section('content')

  <div class="container">
        <h1>Pengusulan Nominasi Rangking Universitas</h1>
        {{-- succes --}}
        <div class="mt-2">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
            @endif
        </div>


        {{-- <ul class="list-group mt-2">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$beasiswa->nama_penawaran}}
                <a href="/adminuniversitas/{{$beasiswa->id_penawaran}}" class="badge badge-info badge-pill">detail</a>
            </li>
        </ul> --}}
        <table class="table table-striped table-bordered" id="beasiswa">
            <thead class="bg-primary text-white" >
              <tr>
                <th scope="col">No</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">IPK</th>
                <th scope="col">Gaji</th>
                <th scope="col">Prodi</th>
                <th scope="col">Fakultas</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($dashboard_pengusulan as $nrangking)
              <tr>
              <th scope="row">{{$loop->iteration}}</th>
                <td scope="col" >{{$nrangking->nama_penawaran}}</td>
                <td scope="col" >{{$nrangking->jml_kuota}}</td>
                <td scope="col" >{{$nrangking->jml_kuota}}</td>
                <td scope="col" >{{$nrangking->jml_kuota}}</td>
                <td scope="col" >{{$nrangking->jml_kuota}}</td>
                <td scope="col" >{{$nrangking->jml_kuota}}</td>
                <td scope="col" ><a href="/nrangking/{{$nrangking->id_penawaran}}" class="badge badge-info badge-pill">detail</a></td>
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
