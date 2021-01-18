@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-lampiran', 'active')
@section('content')
    <div class="modal fade" id="lampiranModal" tabindex="-1" aria-labelledby="lampiranModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="lampiranModalLabel">Tambah lampiran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="{{route('admin.lampiran-penawaran.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="lampiran">Nama lampiran</label>
                    <input type="text" class="form-control" placeholder="Masukkan nama lampiran" name="lampiran">
                </div>
                <div class="form-group">
                    <label for="roles">Jenis Lampiran</label>
                    <select class="custom-select form-control fstdropdown-select" name="roles"
                        id="id_jenis_beasiswa" required>
                        <option value="pendaftar">Lampiran Pendaftar</option>
                        <option value="penawaran">Lampiran Penawaran</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
        </div>
    </div>

    <div class="container ">
        <div class="section-header">
          <h1>Lampiran Penawaran</h1>
        </div>
        @include('includes.flashmessage')
        <div class="card shadow">
          <div class="card-header py-3">
            <div class="d-flex justify-content-between">
              <div class="float-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lampiranModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Lampiran</button>
              </div>
          </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="beasiswa" class="table table-bordered table-hover" width="100%" cellspacing="0" style="border:1px solid #e3e6f0">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama Lampiran</th>
                    <th scope="col" class="text-center">Jenis</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama Lampiran</th>
                    <th scope="col" class="text-center">Jenis</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($lampirans as $lampiran)
                  <tr>
                  <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="col" >{{$lampiran->nama_jenis_file}}</td>
                    <td scope="col" >{{$lampiran->roles}}</td>
                    <td scope="col" class="text-center">
                      <form action="{{route('admin.lampiran-penawaran.destroy',$lampiran->id_jenis_file)}}" method="POST" class="d-inline">
                        @method('Delete')
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></button>
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