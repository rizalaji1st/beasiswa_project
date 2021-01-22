@extends('layouts.adminuniv')
@section('title', 'Tambah Penawaran')
@section('status-penawaran', 'active')
@section('content')
<div class="container col-10 mb-5">
    <div class="section-header">
        <h1>Update Kriteria Penawaran</h1>
    </div>
    <form method="post" action="{{route('admin.kriteria.index')}}" enctype="multipart/form-data" id="form-penawaran"
        name="penawaran" onsubmit="return validated()" autocomplete="off">
        @csrf
        {{-- nama kriteria --}}
        <div class="form-group">
			<label for="id_jenis_kriteria">Id Jenis Kriteria</label>
            <input type="text" class="form-control @error('id_jenis_kriteria') is-invalid @enderror" id="id_jenis_kriteria" 
            placeholder="Masukkan Nama" name="id_jenis_kriteria" value="{{$refKriteria->id_jenis_kriteria}}">
				@error('id_jenis_kriteria')
					<div class="invalid-feedback"> {{ $message }}</div>
				@enderror
			@error('nama')
				<div class="invalid-feedback"> {{ $message }}</div>
			@enderror
		</div>
        <div class="form-group">
            <label for="nama_kriteria">Nama Kriteria</label>
            <input type="nama_kriteria" class="form-control @error('nama_penawaran') is-invalid @enderror"
                id="nama_kriteria" name="nama_kriteria"required value="{{$refKriteria->nama_kriteria}}">
            @error('nama_penawaran')
            <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="{{route('admin.kriteria.index')}}" class="btn btn-outline-warning">Batal</a>
        
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
