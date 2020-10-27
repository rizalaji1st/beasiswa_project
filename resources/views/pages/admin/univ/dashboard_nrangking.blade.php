@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-penetapan', 'active')
@section('content')

  <div class="container">
        <h1>Daftar Pendaftar Beasiswa</h1>
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
                <th scope="col">Daftar Beasiswa</th>
                <th scope="col">Penetapan Oleh Sistem</th>
                <th scope="col">Penetapan Lolos</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($dashboard_nrangking as $nrangking)
              <tr>
              <th scope="row">{{$loop->iteration}}</th>
                <td scope="col" >{{$nrangking->nama_penawaran}}</td>
                <td scope="col" ><a href="/nrangkings/export_excel" class="btn btn-success my-3" target="_blank">EXPORT</a>

                  <td></br><button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                    IMPORT EXCEL
                </button>
                  <!-- Import Excel -->
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
</td>
                <!-- <td scope="col" ><a href="/nrangking/{{$nrangking->id_penawaran}}" class="badge badge-info badge-pill">detail</a></td> -->
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
