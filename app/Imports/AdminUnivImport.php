<?php

namespace App\Imports;

use App\BeaLolos; 
use Maatwebsite\Excel\Concerns\ToModel;

class AdminUnivImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new BeaLolos([
            'id_penawaran' => $row[1],
            'nama_prodi' => $row[2],
            'nim' => $row[3],
            'nama' => $row[4],
            'semester' => $row[5],
            'status_ayah' => $row[6],
            'status_ibu' => $row[7],
            'status_rumah' => $row[8],
            'penghasilan_ayah' => $row[9],
            'penghasilan_ibu' => $row[10],
            'pekerjaan_ayah' => $row[11],
            'pekerjaan_ibu' => $row[12],
            'pendidikan_ayah' => $row[13],
            'pendidikan_ibu' => $row[14],
            'jumlah_tanggungan' => $row[15],
        ]);
    }
}


