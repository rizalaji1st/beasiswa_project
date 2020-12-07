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
<h3 class="mt-2 mb-2">DATA DETAIL SKOR</h3>
        <table class='table table-bordered'>
        <div class="text-right">
        
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                        @foreach($detail as $n) @endforeach
                            <th scope="col" class="text-center">Kriteria - {{$n->id_pendaftar}}</th>
                            @foreach($detail as $n) @endforeach
                            <th scope="col" class="text-center">Bobot - {{$n->id_pendaftar}}</th>
                            @foreach($detail as $n) @endforeach
                            <th scope="col" class="text-center">Skor - {{$n->id_pendaftar}}</th>
                            @foreach($detail as $n) @endforeach
                            <th scope="col" class="text-center">Nilai - {{$n->id_pendaftar}}</th> 
                            </tr>

                    @foreach($detail as $n) 
                    <tr>
                    <td scope="col">Status Ayah (STA)</td>
                    <td scope="col" class="text-center">{{$n->bobot_status_ayah}}</td>
                    <td scope="col" class="text-center">{{$n->status_ayah}}</td>
                    <td scope="col" class="text-center">{{$n->bobot_status_ayah * $n->status_ayah}}</td>
                    </tr>

                    <tr>
                    <td scope="col">Status Ibu (STI)</td>
                    <td scope="col" class="text-center">{{$n->bobot_status_ibu}}</td>
                    <td scope="col" class="text-center">{{$n->status_ibu}}</td>
                    <td scope="col" class="text-center">{{$n->bobot_status_ibu * $n->status_ibu}}</td>
                    </tr>

                    <tr>
                    <td scope="col">Status Rumah (SR)</td>
                    <td scope="col" class="text-center">{{$n->bobot_rumah}}</td>
                    <td scope="col" class="text-center">{{$n->status_rumah}}</td>
                    <td scope="col" class="text-center">{{$n->bobot_rumah * $n->status_rumah}}</td>
                    </tr>

                    <tr>
                    <td scope="col">Pendidikan Ayah (SPA)</td>
                    <td scope="col" class="text-center">{{$n->bobot_pendidikan_ayah}}</td>
                    <td scope="col" class="text-center">{{$n->pendidikan_ayah}}</td>
                    <td scope="col" class="text-center">{{$n->bobot_pendidikan_ayah * $n->pendidikan_ayah}}</td>
                    </tr>

                    <tr>
                    <td scope="col">Pendidikan Ibu (SPI)</td>
                    <td scope="col" class="text-center">{{$n->bobot_pendidikan_ibu}}</td>
                    <td scope="col" class="text-center">{{$n->pendidikan_ibu}}</td>
                    <td scope="col" class="text-center">{{$n->bobot_pendidikan_ibu * $n->pendidikan_ibu}}</td>
                    </tr>

                    <tr>
                    <td scope="col">Pekerjaan Ayah (SKA)</td>
                    <td scope="col" class="text-center">{{$n->bobot_pekerjaan_ayah}}</td>
                    <td scope="col" class="text-center">{{$n->pekerjaan_ayah}}</td>
                    <td scope="col" class="text-center">{{$n->bobot_pekerjaan_ayah * $n->pekerjaan_ayah}}</td>
                    </tr>
                    
                    <tr>
                    <td scope="col">Pekerjaan Ibu (SKI)</td>
                    <td scope="col" class="text-center">{{$n->bobot_pekerjaan_ibu}}</td>
                    <td scope="col" class="text-center">{{$n->pekerjaan_ibu}}</td>
                    <td scope="col" class="text-center">{{$n->bobot_pekerjaan_ibu * $n->pekerjaan_ibu}}</td>
                    </tr>

                    <tr>
                    <td scope="col">Penghasilan Ayah (PA)</td>
                    <td scope="col" class="text-center">{{$n->bobot_penghasilan_ayah}}</td>
                    <td scope="col" class="text-center">{{$n->penghasilan_ayah}}</td>
                    <td scope="col" class="text-center">{{$n->bobot_penghasilan_ayah * $n->penghasilan_ayah}}</td>
                    </tr>

                    <tr>
                    <td scope="col">Penghasilan Ibu (PI)</td>
                    <td scope="col" class="text-center">{{$n->bobot_penghasilan_ibu}}</td>
                    <td scope="col" class="text-center">{{$n->penghasilan_ibu}}</td>
                    <td scope="col" class="text-center">{{$n->bobot_penghasilan_ibu * $n->penghasilan_ibu}}</td>
                    </tr>
 
                    <tr>
                    <td scope="col">Total Skor Beasiswa</td>
                    <td scope="col" class="text-center"></td>
                    <td scope="col" class="text-center"></td>
                    <td scope="col" class="text-center">{{$n->total}}</td>
                    </tr>
                    
                    @endforeach
                            


                    @method('Delete')
                    @csrf
                    </form>
                </td>
                            
                        
                    </tbody>
                </table>
                <div class="text-right">
                <a href="" class="btn btn-outline-warning">kembali</a> 
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