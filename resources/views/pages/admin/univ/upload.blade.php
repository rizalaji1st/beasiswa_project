@extends('layouts.adminuniv')
@section('title', 'Detail Beasiswa')
@section('status-dashboard', 'active')
@section('content')
    <div class="container">
         <h1>Daftar Nominasi Rangking</h1>
        {{-- succes --}}
        <div class="mt-2">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
            @endif
        </div>

         <table class="table table-striped table-bordered" id="beasiswa">
            <thead class="bg-primary text-white" >
            	<form action="/upload/proses" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
 
					<div class="form-group" >
                        <br/>
						<b>Upload Excel</b><br/>
						<input type="file" name="file" class="form-group">
					</div>
 
					<div class="form-group">
						<b>Keterangan</b>
						<textarea class="form-control" name="keterangan"></textarea>
					</div>
 
					<input type="submit" value="Upload" class="btn btn-primary">
				</form>


				
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                	 <tbody>
              <tr>
                <th scope="col">No</th>
                <th scope="col">File</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Opsi</th>
              </tr>
              @foreach($gambar as $g)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
				<td><img width="150px" src="{{ url('/data_file/'.$g->file) }}"></td>
				<td>{{$g->keterangan}}</td>
				<td><a class="btn btn-danger" href="/upload/hapus/{{ $g->id }}">HAPUS</a></td>
			</tr>
              @endforeach
                   </tbody>
                </table>
            </div>
            </div>
        </div>
    
@endsection


