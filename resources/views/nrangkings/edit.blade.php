
@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-dashboard', 'active')
@section('content')


@section('title', 'Form Ubah Data Nominasi Rangking')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-8">
				 <h1 class="mt-2">Form Ubah Data Nominasi Rangking</h1>

					<form method="post" action="/nrangkings/{{ $nrangking->id }}">
						@method('patch')
						@csrf
					  <div class="form-group">
					    <label for="nim">NIM</label>
					    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" placeholder="Masukkan NIM" name="nim" value="{{ $nrangking->nim }}">
					    @error('nim')
					          <div class="invalid-feedback"> {{ $message }}</div>
					    @enderror
					  </div>
					  <div class="form-group">
					    <label for="nama">Nama</label>
					    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama" value="{{ $nrangking->nama }}">
					    @error('nama')
					          <div class="invalid-feedback"> {{ $message }}</div>
					    @enderror
					  </div>
					  <div class="form-group">
					    <label for="prodi">Prodi</Pabel>
					    <input type="text" class="form-control" id="prodi" Placeholder="Masukkan Prodi" Pame="prodi" Palue="{{ $nrangking->prodi }P">
					  </div>
					  <div class="form-group">
					    <label for="fakultas">Fakultas</label>
					    <input type="text" class="form-control" id="fakultas" placeholder="Masukkan Fakultas" name="fakultas" value="{{ $->fakultas }}">
					  </div>
					  <div class="form-group">
					    <label for="ips">Ips</label>
					    <input type="text" class="form-control @error('ips') is-invalid @enderror" id="ips" placeholder="Masukkan Ips" name="ips" value="{{ $nrangking->ips }}">
					    @error('ips')
					          <div class="invalid-feedback"> {{ $message }}</div>
					    @enderror
					  </div>
					  <button type="submit" class="btn btn-primary">Ubah Data</button>
					</form>


			</div>
		</div>
	</div>

@endsection
