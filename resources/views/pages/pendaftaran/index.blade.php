<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('mhstemplate.style')
</head>

<body>
    <div class="container-fluid">
        <div class="text-center mt-3">
        <h3><b>Daftar Beasiswa Aktif</b></h3>
        </div>
        {{-- succes --}}
        <div class="mt-2">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>

            @endif
        </div>
        
        <div class="row">
            @foreach ($beasiswas as $beasiswa)
            <div class="col-sm-2 mr-5">
                <div class="card mt-3" style="width: 18rem;">
                    <div class="card-body">
                        <h4 class="card-title">{{$beasiswa->nama_penawaran}}</h4>
                        <h5 class="card-subtitle mb-4">Jumlah Kuota {{$beasiswa->jml_kuota}}</h5>
                        <h5><b>Timeline</b></h5>
                        <h6 class="card-subtitle mt-2 mb-2 text-muted">Mulai Pendaftaran :
                            {{$beasiswa->tgl_awal_pendaftaran->format('d M Y')}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Pendaftaran berakhir :
                            {{$beasiswa->tgl_akhir_pendaftaran->format('d M Y')}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Pendaftaran berakhir :
                            {{$beasiswa->tgl_pengumuman->format('d M Y')}}</h6>
                        <h6 class="card-subtitle mb-2 mt-3">Minimal IPK {{$beasiswa->ipk}}</h6>
                        <h6 class="card-subtitle mb-2">Minimal Semeter {{$beasiswa->min_semester}}</h6>
                        <a href="/pendaftaran/{{$beasiswa->id_penawaran}}" class="btn btn-sm btn-primary">Daftar</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        
    </div>


    @include('mhstemplate.script')
</body>

</html>
