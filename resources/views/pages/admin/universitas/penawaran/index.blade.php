@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-penawaran', 'active')
@section('content')

    <div class="container ">
        <h1>Penawaran Beasiswa</h1>
        @include('includes.flashmessage')
        <a href="{{route('admin.penawarans.create')}}" class="btn btn-primary mt-4 mb-4"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambahkan Penawaran</a>
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Beasiswa Aktif</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="beasiswa" class="table table-bordered" width="100%" cellspacing="0" style="border:1px solid #e3e6f0">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama Beasiswa</th>
                    <th scope="col" class="text-center">Kuota</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama Beasiswa</th>
                    <th scope="col" class="text-center">Kuota</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </tfoot>
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
          </div>
        </div>
    </div>

@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#beasiswa').DataTable();
        } );
    </script>
@endpush
