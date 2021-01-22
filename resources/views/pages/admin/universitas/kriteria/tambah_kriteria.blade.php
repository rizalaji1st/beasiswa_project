@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-kriteria', 'active')
@section('content')
    <div class="modal fade" id="kriteriaModal" tabindex="-1" aria-labelledby="kriteriaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="kriteriaModalLabel">Tambah Kriteria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="{{route('admin.kriteria.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="kriteria">Id Kriteria</label>
                    <input type="text" class="form-control @error('id_jenis_kriteria') is-invalid @enderror" 
                    id="id_jenis_kriteria" placeholder="Masukkan Nama" name="id_jenis_kriteria" 
                    value="{{ old('id_jenis_kriteria') }}">
				@error('id_jenis_kriteria') 
					<div class="invalid-feedback"> {{ $message }}</div>
				@enderror
                </div>
                <div class="form-group">
                    <label for="nama_kriteria">Nama Kriteria</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Kriteria" 
                    name="nama_kriteria" value="{{ old('nama_kriteria') }}" id="nama_kriteria">
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
        <h1>Kriteria Penawaran</h1>
        </div>
        @include('includes.flashmessage')
        <div class="card shadow">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
            <div class="float-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kriteriaModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Kriteria</button>
            </div>
        </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table id="beasiswa" class="table table-bordered table-hover" width="100%" cellspacing="0" style="border:1px solid #e3e6f0">
                <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Id Kriteria</th>
                    <th scope="col" class="text-center">Nama Kriteria</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Id Kriteria</th>
                    <th scope="col" class="text-center">Nama Kriteria</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($refKriteria as $n)
                <thead>
                <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="col" class="text-center">{{$n->id_jenis_kriteria}}</td>
                    <td scope="col" class="text-center">{{$n->nama_kriteria}}</td>
                    <td scope="col" class="text-center">
                      <form action="{{route('admin.kriteria.destroy',$n->id_jenis_kriteria)}}" method="POST" class="d-inline">
                        @method('Delete')
                        @csrf
                        <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#lampiranUpdateModal{{$n->id_jenis_kriteria}}"><i class="fas fa-pencil-alt"></i></button>
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
@section('modal')
  @foreach ($refKriteria as $n)    
  <div class="modal fade" id="lampiranUpdateModal{{$n->id_jenis_kriteria}}" tabindex="-1" aria-labelledby="lampiranModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="lampiranModalLabel">Tambah lampiran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="{{route('admin.kriteria.update', $n->id_jenis_kriteria)}}" method="post">
            @csrf
            @method('PUT')
            <input type="text" name="idLampiran" value="{{$n->id_jenis_kriteria}}" hidden></td>
            <div class="form-group">
                <label for="kriteria">Id Jenis Kriteria</label>
                <input type="text" class="form-control" placeholder="Masukkan nama lampiran" name="id_jenis_kriteria" value="{{$n->id_jenis_kriteria}}">
            </div>
            <div class="form-group">
                <label for="kriteria">Nama Kriteria</label>
                <input type="text" class="form-control" placeholder="Masukkan nama lampiran" name="nama_kriteria" value="{{$n->nama_kriteria}}">
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
  @endforeach
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#beasiswa').DataTable();
        } );
    </script>
@endpush






