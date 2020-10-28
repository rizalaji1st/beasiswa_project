@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-penawaran', 'active')
@section('content')

    <div class="container">
        <h1>Daftar Beasiswa Aktif</h1>
        @include('includes.flashmessage')
        <a href="{{route('admin.penawarans.create')}}" class="btn btn-primary mt-4 mb-2"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambahkan Penawaran</a>
        <table class="table table-striped table-bordered" id="beasiswa">
            <thead class="bg-primary text-white" >
              <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Nama Beasiswa</th>
                <th scope="col" class="text-center">Kuota</th>
                <th scope="col" class="text-center">Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($beasiswas as $beasiswa)
              <tr>
              <th scope="row" class="text-center">{{$loop->iteration}}</th>
                <td scope="col" >{{$beasiswa->nama_penawaran}}</td>
                <td scope="col" class="text-center">{{$beasiswa->jml_kuota}} Penerima</td>
                <td scope="col" class="text-center">
                  <a href="{{route('admin.penawarans.show',$beasiswa->id_penawaran)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                  <a href="{{route('admin.penawarans.edit',$beasiswa->id_penawaran)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                  <form action="{{route('admin.penawarans.destroy',$beasiswa->id_penawaran)}}" method="POST" class="d-inline">
                    @method('Delete')
                    @csrf
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></button>
                  </form>
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
