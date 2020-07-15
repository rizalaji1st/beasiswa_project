@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-dashboard', 'active')
@section('content')


@section('title', 'Detail Mahasiswa')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-6">
				 <h1 class="mt-2">Detail Nominasi Rangking</h1>

				<div class="card">
		  <div class="card-body">
		    <h5 class="card-title">{{ $nrangking->nim }}</h5>
		    <h6 class="card-subtitle mb-2 text-muted">{{ $nrangking->nama }}</h6>
		    <p class="card-text">{{ $nrangking->prodi }}</p>
		    <p class="card-text">{{ $nrangking->fakultas }}</p>
		    <p class="card-text">{{ $nrangking->ips }}</p>

		    <a href="{{ $nrangking->id }}/edit" class="btn btn-primary">Edit</a>
		    <form action="/nrangkings/{{ $nrangking->id}}" method="post" class="d-inline">
		    	@method('delete')
		    	@csrf
		    	<button type="submit" class="btn btn-danger">Delete</button>
			</form>

		    <a href="/nrangkings" class="card-link">Kembali</a>
		  </div>
		</div>

			</div>
		</div>
	</div>

@endsection
