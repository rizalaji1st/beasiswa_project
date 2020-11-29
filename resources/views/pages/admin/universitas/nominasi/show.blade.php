@extends('layouts.adminuniv')
@section('title', 'Detail Beasiswa')
@section('status-dashboard', 'active')
@section('content')
    <div class="container my-3">
        {{-- succes --}}
        <div class="mt-2">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
            @endif
        </div>
<h3 class="mt-2 mb-2">DATA NILAI</h3>

        <table class='table table-bordered'>
        <div class="text-right">
        <a href="/admin/nominasi/cetak_excel"  class="btn btn-primary" target="_blank">CETAK EXCEL</a>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th scope="col">No</th>
                            <td scope="col">Id Pendaftar</td>
                            <td scope="col">NIM</td>
                            <td scope="col">Nama</td>
                            <td scope="col">Prodi</td>
                            <td scope="col">Fakultas</td>
                            <td scope="col">Skor</td>
                            <td scope="col" class="text-center">Action</td>    
                            </tr>
                            @foreach($nominasi as $n)                      
                            <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td scope="col">{{$n->id_pendaftar}}</td>
                            <td scope="col">{{$n->nim}}</td>
                            <td scope="col">{{$n->nama}}</td>
                            <td scope="col">{{$n->nama_prodi}}</td>
                            <td scope="col">{{$n->nama_fakultas}}</td>
                            @php
                            $total =$n->status_ayah + $n->status_ibu + 
                                    $n->pekerjaan_ayah + $n->pekerjaan_ibu +
                                    $n->pendidikan_ayah + $n->pendidikan_ibu +
                                    $n->penghasilan_ayah + $n->penghasilan_ibu +
                                    $n->status_rumah + $n->tanggungan
                                    ;
                            
                            @endphp
                            <td scope="col">{{$total}}</td>
                            <td scope="col" class="text-center">
                    <a class="btn btn-primary" href="" > Detail Skor <i class="fa fa-arrow-right"></i></a>
                    @method('Delete')
                    @csrf
                    </form>
                </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-right">
                <a href="{{route('admin.nominasi.index')}}" class="btn btn-outline-warning">kembali</a> 
            </div>
            </div>
            </div>
            {{-- button --}}  
            </div>
            @endsection

            @push('addon-script')
                <script>
                    $(document).ready(function() {
                        $('#beasiswa').DataTable();
                    } );
                </script>
            @endpush