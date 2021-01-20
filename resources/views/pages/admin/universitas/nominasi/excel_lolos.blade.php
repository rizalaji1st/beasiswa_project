<table>
    <thead>
        <!-- <tr>
            <th>No</th>
            <th>Id Penawaran</th>
            <th>Prodi</th>
            <th>Fakultas</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Semester</th>
            <th>Status Ayah</th>
            <th>Status Ibu</th>
            <th>Status Rumah</th>
            <th>Penghasilan Ayah</th>
            <th>Penghasilan Ibu</th>
            <th>Pekerjaan Ayah</th>
            <th>Pekerjaan Ibu</th>
            <th>Pendidikan Ayah</th>
            <th>Pendidikan Ibu</th>
            <th>Jumlah Tanggungan</th>
        </tr>
    </thead> -->
    <tbody>
    @php $no = 1 @endphp
    @foreach($pendaftaran as $n)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $n->id_penawaran }}</td>
            <td>{{$n->users->RefProdi->nama_prodi}}</td>
            <td>{{ $n->nim}}</td>
            <td>{{$n->users->name}}</td>
            <td>{{ $n->semester}}</td>
            <td>{{ $n->status_ayah}}</td>
            <td>{{ $n->status_ibu}}</td>
            <td>{{ $n->status_rumah}}</td>
            <td>{{ $n->penghasilan_ayah}}</td>
            <td>{{ $n->penghasilan_ibu}}</td>
            <td>{{ $n->pekerjaan_ayah}}</td>
            <td>{{ $n->pekerjaan_ibu}}</td>
            <td>{{ $n->pendidikan_ayah}}</td>
            <td>{{ $n->pendidikan_ibu}}</td>
            <td>{{ $n->jumlah_tanggungan}}</td>
        </tr>
    @endforeach
    </tbody>
</table>