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
            <a href="/admin/cetak_excel"  class="btn btn-primary" target="_blank">CETAK EXCEL</a>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th scope="col">No</th>
                                <td scope="col">NIM</td>
                                <td scope="col">Nama</td>
                                <td scope="col">Prodi</td>
                                <td scope="col">Skor</td>
                                <td scope="col" class="text-center">Action</td>    
                                </tr>
                        </tbody>
                        <tbody>
                    @foreach ($pendaftaran as $n)
                    <tr>
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                        <td scope="col" class="text-center">{{$n->users->nim}}</td>
                        <td scope="col" class="text-center">{{$n->users->name}}</td>
                        <td scope="col" class="text-center">{{$n->users->RefProdi->nama_prodi}}</td>
                        <td scope="col" class="text-center">{{$hasil[$loop->iteration-1]}}</td>
                        
                        <td scope="col" class="text-center">
                        <a href="{{route('admin.detail_skor',$n->id_pendaftar)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            @method('Delete')
                            @csrf
                        </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
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

