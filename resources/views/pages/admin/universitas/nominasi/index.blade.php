@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-penawaran', 'active')
@section('content')

    <div class="container">
        <div class="section-header">
          <h1>Daftar Beasiswa Aktif</h1>
        </div>
        @include('includes.flashmessage')
        <table class="table table-striped table-bordered" id="beasiswa">
            <thead class="bg-primary text-white" >
              <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Nama Beasiswa</th>
                <th scope="col" class="text-center">Kuota</th>             
                <th scope="col" class="text-center">Jumlah Pendaftar</th>
                <th scope="col" class="text-center">Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($beasiswas as $a)
              <tr>
              <th scope="row" class="text-center">{{$loop->iteration}}</th>
                <td scope="col" class="text-center">{{$a->nama_penawaran}}</td>
                <td scope="col" class="text-center">{{$a->jml_kuota}} Penerima</td>
                  @foreach($a->pendaftarPenawaran as $t)
                  
                  @endforeach
                <td scope="col" class="text-center">{{$a->pendaftarPenawaran->count()}} Pendaftar</td>
                <td scope="col" class="text-center">
                  <a href="{{route('admin.nominasi.show',$a->id_penawaran)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                    @method('Delete')
                    @csrf
                  </form>
                </td>
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
