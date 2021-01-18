@extends('layouts.adminuniv')
@section('title', 'pendaftaran Beasiswa')
@section('pendaftaran-dashboard', 'active')
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
<h3 class="mt-2 mb-2">DATA DETAIL SKOR</h3>
        <table class='table table-bordered'>
        <div class="text-right">
        
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                        @foreach($pendaftaran as $n) @endforeach
                            <th scope="col" class="text-center">Kriteria - {{$n->id_pendaftar}}</th>
                            @foreach($pendaftaran as $n) @endforeach
                            <th scope="col" class="text-center">Bobot - {{$n->id_pendaftar}}</th>
                            @foreach($pendaftaran as $n) @endforeach
                            <th scope="col" class="text-center">Skor - {{$n->id_pendaftar}}</th>
                            @foreach($pendaftaran as $n) @endforeach
                            <th scope="col" class="text-center">Nilai - {{$n->id_pendaftar}}</th> 
                            </tr>


                    <tr>

                    @foreach($pendaftaran as $n) 
                    <tr>
                    <td scope="col">Status Rumah (SR)</td>
                    <td scope="col" class="text-center">{{$bobot_rumah[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$skor_rumah[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$hasil_rumah[$loop->iteration-1]}}</td>
                    </tr>

                    <tr>
                    <td scope="col">Jumlah Tanggungan</td>
                    <td scope="col" class="text-center">{{$bobot_tanggungan[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$skor_tanggungan[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$hasil_tanggungan[$loop->iteration-1]}}</td>
                    </tr>

                    <tr>
                    <td scope="col">Status Ayah (STA)</td>
                    <td scope="col" class="text-center">{{$bobot_staAyah[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$skor_staAyah[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$hasil_staAyah[$loop->iteration-1]}}</td>
                    </tr>

                    <tr>
                    <td scope="col">Status Ibu (STI)</td>
                    <td scope="col" class="text-center">{{$bobot_staIbu[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$skor_staIbu[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$hasil_staIbu[$loop->iteration-1]}}</td>
                    </tr>

                    
                    <tr>
                    <td scope="col">Status Pendidikan Ayah (SPA)</td>
                    <td scope="col" class="text-center">{{$bobot_pendAyah[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$skor_pendAyah[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$hasil_pendAyah[$loop->iteration-1]}}</td>
                    </tr>

                    <tr>
                    <td scope="col">Status Pendidikan Ibu (SPI)</td>
                    <td scope="col" class="text-center">{{$bobot_pendIbu[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$skor_pendIbu[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$hasil_pendIbu[$loop->iteration-1]}}</td>
                    </tr>

                    <tr>
                    <td scope="col">Status Pekerjaan Ayah (SKA)</td>
                    <td scope="col" class="text-center">{{$bobot_pekAyah[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$skor_pekAyah[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$hasil_pekAyah[$loop->iteration-1]}}</td>
                    </tr>

                    <tr>
                    <td scope="col">Status Pekerjaan Ibu (SKI)</td>
                    <td scope="col" class="text-center">{{$bobot_pekIbu[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$skor_pekIbu[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$hasil_pekIbu[$loop->iteration-1]}}</td>
                    </tr>

                    <tr>
                    <td scope="col">Penghasilan Ayah (PA)</td>
                    <td scope="col" class="text-center">{{$bobot_pengAyah[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$skor_pengAyah[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$hasil_pengAyah[$loop->iteration-1]}}</td>
                    </tr>

                    <tr>
                    <td scope="col">Penghasilan Ibu (PI)</td>
                    <td scope="col" class="text-center">{{$bobot_pengIbu[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$skor_pengIbu[$loop->iteration-1]}}</td>
                    <td scope="col" class="text-center">{{$hasil_pengIbu[$loop->iteration-1]}}</td>
                    </tr>

                    <tr>
                    <td scope="col">Total Skor Beasiswa</td>
                    <td scope="col" class="text-center"></td>
                    <td scope="col" class="text-center"></td>
                    <th scope="col" class="text-center">{{$hasil[$loop->iteration-1]}}</th>
                    </tr>

                    @endforeach
                    @method('Delete')
                    @csrf
                    </form>
                </td>
                            
                        
                    </tbody>
                </table>
                <div class="text-right">
                <a href="{{route('admin.nominasi.show',$n->id_pendaftar)}}" class="btn btn-outline-warning">kembali</a> 
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