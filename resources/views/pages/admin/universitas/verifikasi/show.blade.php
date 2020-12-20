@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-verifikasi', 'active')
@section('content')
  @foreach ($pendaftars as $pendaftar)
    <div class="modal fade" tabindex="-1" id="modalVerifikasi{{$pendaftar->id_pendaftar}}">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="{{route('admin.verifikasi.update',$beasiswa->id_penawaran)}}" method="POST">
            @csrf
            @method('PUT')
          <div class="modal-header">
            <h5 class="modal-title">Detail Pendaftar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered">
              <tr>
                <td scope="col">ID Pendaftar</td>
                <td scope="col">{{$pendaftar->id_pendaftar}}</td>
              </tr>
              <tr hidden>
                <td><input type="text" name="noPendaftar" value="{{$pendaftar->id_pendaftar}}"></td>
              </tr>
              <tr>
                <td scope="col">Nama</td>
                <td scope="col">{{$pendaftar->userPendaftar->name}}</td>
              </tr>
              <tr>
                <td scope="col">NIM</td>
                <td scope="col">{{$pendaftar->nim}}</td>
              </tr>
              <tr>
                <td scope="col">Prodi</td>
                <td scope="col">{{$pendaftar->userPendaftar->userProdi->nama_prodi}}</td>
              </tr>
              <tr>
                <td scope="col">Semester</td>
                <td scope="col">{{$pendaftar->userPendaftar->semester}}</td>
              </tr>
              <tr>
                <td scope="col">IPS</td>
                <td scope="col">{{$pendaftar->ips}}</td>
              </tr>
              <tr>
                <td scope="col">IPK</td>
                <td scope="col">{{$pendaftar->ipk}}</td>
              </tr>
              <tr>
                <td scope="col">Penghasilan</td>
                <td scope="col">{{$pendaftar->penghasilan}}</td>
              </tr>
              <tr>
                <td scope="col">Status Verifikasi</td>
                <td scope="col">
                  <div class="form-group">
                    <select class="custom-select form-control fstdropdown-select" name="status_verifikasi"
                        id="id_jenis_beasiswa" value="{{$pendaftar->is_verified}}" required>
                        
                        <option value="menunggu verifikasi"
                            {{"menunggu verifikasi" == $pendaftar->is_verified ? "selected":"" }}>Mengunggu Verifikasi
                        </option>
                        <option value="terverifikasi"
                            {{"terverifikasi" == $pendaftar->is_verified ? "selected":"" }}>Terverifikasi
                        </option>
                        <option value="ditolak"
                            {{"ditolak" == $pendaftar->is_verified ? "selected":"" }}>Ditolak
                        </option>
                        <option value="perbaikan"
                            {{"perbaikan" == $pendaftar->is_verified ? "selected":"" }}>Perbaikan
                        </option>
                        
                    </select>
                </div>
                </td>
              </tr>
              <tr>
                <td scope="col">Catatan Verifikasi</td>
                <td scope="col">
                  <textarea name="catatan" id="catatan" cols="30" rows="5" class="form-control">{{$pendaftar->verified_note}}</textarea>
                </td>
              </tr>
            </table>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endforeach
    <div class="container ">
      @include('includes.flashmessage')
        <h1>Penawaran {{$beasiswa->nama_penawaran}}</h1>
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Beasiswa Aktif</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="beasiswa" class="table table-bordered table-hover" width="100%" cellspacing="0" style="border:1px solid #e3e6f0">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">No Daftar</th>
                    <th scope="col" class="text-center">Tgl Daftar</th>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">Program Studi</th>
                    <th scope="col" class="text-center">Berkas</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Catatan</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th scope="col" class="text-center">No Daftar</th>
                    <th scope="col" class="text-center">Tgl Daftar</th>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">Program Studi</th>
                    <th scope="col" class="text-center">Berkas</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Catatan</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($pendaftars as $pendaftar)
                  <tr>
                    <td scope="col" >{{$pendaftar->id_pendaftar}}</td>
                    <td scope="col" >{{$pendaftar->created_at}}</td>
                    <td scope="col" >{{$pendaftar->userPendaftar->name}}</td>
                    <td scope="col" >{{$pendaftar->userPendaftar->userProdi->nama_prodi}}</td>
                    
                    <td scope="col" >
                      @foreach ($pendaftar->pendaftaranUpload as $file)
                      <div class="badge badge-sm badge-success mx-1 my-1">
                        <i class="fas fa-file-download    "></i>
                      <a href="{{Storage::url($file->path_file)}}" class="text-white" target="_blank">{{Illuminate\Support\Str::between($file->nama_file, $pendaftar->userPendaftar->name."_", '_')}}</a>
                      </div>  
                      <br>
                      @endforeach
                    </td>
                    <td scope="col" ><span class="badge badge-pill text-white
                      {{"terverifikasi" == $pendaftar->is_verified ? "badge-success":
                      ("menunggu verifikasi" == $pendaftar->is_verified ? "badge-warning":
                      ("ditolak" == $pendaftar->is_verified ? "badge-danger":
                      ("perbaikan" == $pendaftar->is_verified ? "badge-info":""))) }}">{{$pendaftar->is_verified}}</span></td>
                    <td scope="col">{{$pendaftar->verified_note}}</td>
                    <td scope="col" class="text-center">
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalVerifikasi{{$pendaftar->id_pendaftar}}"><i class="fas fa-pencil-alt    "></i></button>
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
