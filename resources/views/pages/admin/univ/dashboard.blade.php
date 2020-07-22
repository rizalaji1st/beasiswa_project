@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-dashboard', 'active')
@section('content')

    <div class="container">
        <h1>Daftar Beasiswa Aktif</h1>
        {{-- succes --}}
        <div class="mt-2">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
            @endif
        </div>
        <a href="{{url('/adminuniversitas/create')}}" class="btn btn-primary mt-4 mb-2"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambahkan Penawaran</a>
        
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
                <th scope="col">Nama Beasiswa</th>
                <th scope="col">Kuota</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($beasiswas as $beasiswa)
              <tr>
              <th scope="row">{{$loop->iteration}}</th>
                <td scope="col" >{{$beasiswa->nama_penawaran}}</td>
                <td scope="col" >{{$beasiswa->jml_kuota}}</td>
                <td scope="col" ><a href="/adminuniversitas/{{$beasiswa->id_penawaran}}" class="badge badge-info badge-pill">detail</a></td>
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
