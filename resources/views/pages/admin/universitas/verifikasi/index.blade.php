@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-verifikasi', 'active')
@section('content')

    <div class="container ">
        <div class="section-header">
          <h1>Penawaran Beasiswa</h1>
        </div>
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Beasiswa Aktif</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="beasiswa" class="table table-bordered table-hover" width="100%" cellspacing="0" style="border:1px solid #e3e6f0">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama Beasiswa</th>
                    <th scope="col" class="text-center">Jenis Beasiswa</th>
                    <th scope="col" class="text-center">Tahun Akademik</th>
                    <th scope="col" class="text-center">Penerima</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama Beasiswa</th>
                    <th scope="col" class="text-center">Jenis Beasiswa</th>
                    <th scope="col" class="text-center">Tahun Akademik</th>
                    <th scope="col" class="text-center">Penerima</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($beasiswas as $beasiswa)
                  <tr>
                  <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td scope="col" >{{$beasiswa->nama_penawaran}}</td>
                    <td scope="col" >{{$beasiswa->refJenisPenawaran->nama_beasiswa}}</td>
                    <td scope="col" >{{$beasiswa->tahun_dasar_akademik}}</td>
                    <td scope="col" >{{$beasiswa->pendaftarPenawaran->count()}} Pendaftar</td>
                    <td scope="col" class="text-center">
                      <a href="{{route('admin.verifikasi.show',$beasiswa->id_penawaran)}}" class="btn btn-success btn-sm"><i class="fas fa-eye mr-2"></i><span>Verifikasi</span></a>
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
