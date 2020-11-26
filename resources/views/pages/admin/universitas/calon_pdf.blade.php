<!DOCTYPE html>
<html>
<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
        <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>
    </center>
 <table class='table table-bordered'>
        <thead>
            <tr>
                <th scope="col">No</th>
                <td scope="col">Id Pendaftar</td>
                <td scope="col">NIM</td>
                <td scope="col">Nama</td>
                <td scope="col">Prodi</td>
                <td scope="col">Fakultas</td>
                <td scope="col">Skor</td>
               
            </tr>
        </thead>
        <tbody>

                          @foreach($nrank as $nrangking)                      
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td scope="col">{{$nrangking->id_pendaftar}}</td>
                        <td scope="col">{{$nrangking->nim}}</td>
                        <td scope="col">{{$nrangking->nama}}</td>
                        <td scope="col">{{$nrangking->nama_prodi}}</td>
                        <td scope="col">{{$nrangking->nama_fakultas}}</td>
                        <td scope="col"></td>
                        


                    </tr>
                    @endforeach
                </tbody>
                    </table>
            </div>
        </div>
</center>
</body>
</html>
        