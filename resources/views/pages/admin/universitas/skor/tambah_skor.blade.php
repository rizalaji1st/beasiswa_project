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
                    <label for="roles">Jens Kriteria</label>
                    <select class="custom-select form-control fstdropdown-select" name="roles"
                        id="id_jenis_kriteria" required>
                        <option value="pendaftar">STA</option>
                        <option value="penawaran">STI</option>
                        <option value="penawaran">SR</option>
                        <option value="penawaran">SPA</option>
                        <option value="penawaran">SPI</option>
                        <option value="penawaran">SKA</option>
                        <option value="penawaran">SKI</option>
                        <option value="penawaran">T</option>
                        <option value="penawaran">PA</option>
                        <option value="penawaran">PI</option>
                        <option value="penawaran">P</option>
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
                @foreach ($skor as $n)
                <thead>
                <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="col" class="text-center">{{$n->RefKriteria->id_jenis_kriteria}}</td>
                    <td scope="col" class="text-center">{{$n->nama_skor}}</td>
                    <td scope="col" class="text-center">{{$n->skor}}</td>
                    <td scope="col" class="text-center">
                    
                    <!-- tombol edit -->
                    <a href="{{route('admin.kriteria.update',$n->id_jenis_kriteria)}}" id="edit" data-toggle="modal" data-target="#modal-edit" class="btn btn-primary btn-sm" 
                    data-id = "{{$n->id_jenis_kriteria}}"
                    data-nama = "{{$n->nama_kriteria}}"
                    ><i class="fas fa-pencil-alt"></i></a>

                    <!-- tombol delete -->
                    <form action="{{route('admin.skor.destroy',$n->id_skor)}}" method="POST" class="d-inline">
                        @method('Delete')
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></button>
                        </thead>
                    </form>
                    </td>
                </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Skor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{route('admin.skor.update',$n->id_skor)}}" method="post">
                        @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="kriteria">Nama Kriteria</label> Kriteria</label>
                                <input id="id_jenis_kriteria" type="text" class="form-control" 
                                placeholder="Masukkan Id Kriteria" name="id_jenis_kriteria" value="{{$n->id_jenis_kriteria}}">
                            </div>
                            <div class="form-group">
                                <label for="kriteria">Nama Skor</label>
                                <input id="edit_nama_skor" type="text" class="form-control" placeholder="Masukkan Nama Skor" name="nama_skor">
                            </div>
                            <div class="form-group">
                                <label for="kriteria">Skor</label>
                                <input id="edit_skor" type="text" class="form-control" placeholder="Masukkan Skor" name="skor">
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
                    </div>
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

    <!-- modal edit -->
    <script>
        $(document).ready(function(){
            $(document).on('click', '#edit', function(){
                var id_jenis_kriteria = $(this).data('id_jenis_kriteria');
                var nama_skor = $(this).data('nama_skor');
                var skor = $(this).data('skor');

                $('#edit_id_jenis_kriteria').val(id_jenis_kriteria);
                $('#edit_nama_skor').val(nama_skor);
                $('#edit_skor').val(skor);
            })
        });
    </script>
@endpush


