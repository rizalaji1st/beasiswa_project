
@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-dashboard', 'active')
@section('content')


@section('title', 'Form Tambah Mahasiswa')

@section('content') 
	<div class="container">
		<div class="row">
			<div class="col-8"> 
				 <h1 class="mt-2">Form Tambah Nominasi Rangking</h1>

					<form method="post" action="/nrangkings">
						@csrf
					<div class="form-group">
					    <label for="nim">NIM</label>
					    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" placeholder="Masukkan NIM" name="nim" value="{{ old('nim') }}">
					    @error('nim')
					<div class="invalid-feedback"> {{ $message }}</div>
					    @enderror
					  </div>
					  <div class="form-group">
					    <label for="nama">Nama</label>
					    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama" value="{{ old('nama') }}">
					    @error('nama')
					          <div class="invalid-feedback"> {{ $message }}</div>
					    @enderror
					  </div>
					  <div class="form-group">
					    <label for="prodi">Prodi</label>
					    <input type="text" class="form-control" id="prodi" placeholder="Masukkan Prodi" name="prodi" value="{{ old('prodi') }}">
					  </div>
					  <div class="form-group">
					    <label for="fakultas">Fakultas</label>
					    <input type="text" class="form-control" id="fakultas" placeholder="Masukkan Fakultas" name="fakultas" value="{{ old('fakultas') }}">
					  </div>
					 <div class="form-group">
					    <label for="ips">IPS</label>
					    <input type="text" class="form-control @error('ips') is-invalid @enderror" id="ips" placeholder="Masukkan Ips" name="ips" value="{{ old('ips') }}">
					    @error('ips')
					<div class="invalid-feedback"> {{ $message }}</div>
					    @enderror
					  </div>
					  <button type="submit" class="btn btn-primary">Tambah Data</button>
					</form>

		
			</div>
		</div>
	</div>

@endsection
