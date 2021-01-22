@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-kriteria', 'active')
@section('content')
    <div class="modal fade" id="kriteriaModal" tabindex="-1" aria-labelledby="kriteriaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="kriteriaModalLabel">Tambah skor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="{{route('admin.skor.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="roles">Nama Kriteria</label>
                    <select class="custom-select form-control fstdropdown-select" name="id_jenis_kriteria"
                        id="id_jenis_kriteria" required> 
                        @foreach($refKriterias as $kriteria)
                        <option value="{{$kriteria->id_jenis_kriteria}}">{{$kriteria->nama_kriteria}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_skor">Nama Skor</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Skor" name="nama_skor">
                </div>
                <div class="form-group">
                    <label for="skor">Skor</label>
                    <input type="text" class="form-control" placeholder="Masukkan Skor" name="skor">
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
        <h1>Skor Penawaran</h1>
        </div>
        @include('includes.flashmessage')
        <div class="card shadow">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
            <div class="float-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kriteriaModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Skor</button>
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
                    <th scope="col" class="text-center">Nama Skor</th>
                    <th scope="col" class="text-center">Skor</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Id Kriteria</th>
                    <th scope="col" class="text-center">Nama Skor</th>
                    <th scope="col" class="text-center">Skor</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($refSkor as $n)
                <thead>
                <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="col" class="text-center">{{$n->RefKriteria->id_jenis_kriteria}}</td>
                    <td scope="col" class="text-center">{{$n->nama_skor}}</td>
                    <td scope="col" class="text-center">{{$n->skor}}</td>
                    <td scope="col" class="text-center">
                    
                    <form action="{{route('admin.skor.destroy',$n->id_skor)}}" method="POST" class="d-inline">
                        @method('Delete')
                        @csrf
                        <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#lampiranUpdateModal{{$n->id_skor}}"><i class="fas fa-pencil-alt"></i></button>
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

                    <!-- Modal Update -->
                    @endsection
@section('modal')
  @foreach ($refSkor as $n)    
  <div class="modal fade" id="lampiranUpdateModal{{$n->id_skor}}" tabindex="-1" aria-labelledby="lampiranModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="lampiranModalLabel">Update Skor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="{{route('admin.skor.update', $n->id_skor)}}" method="post">
            @csrf
            @method('PUT')
                            @csrf
                            
            <input type="text" name="id_skor" value="{{$n->id_skor}}" hidden></td>
                            <div class="form-group">
                                <label for="kriteria">Nama Kriteria</label> Kriteria</label>
                                <input id="id_jenis_kriteria" type="text" class="form-control" 
                                placeholder="Masukkan Id Kriteria" name="id_jenis_kriteria" value="{{$n->id_jenis_kriteria}}">
                            </div>
                            <div class="form-group">
                                <label for="kriteria">Nama Skor</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Skor" name="nama_skor" value="{{$n->nama_skor}}">
                            </div>
                            <div class="form-group">
                                <label for="kriteria">Skor</label>
                                <input  type="text" class="form-control" placeholder="Masukkan Skor" name="skor" value="{{$n->skor}}">
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



