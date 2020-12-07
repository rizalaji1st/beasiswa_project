<?php

namespace App\Imports;

use App\BeaLolos; 
use App\PendaftarPenawaran; 
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
            'id_pendaftar' => $row[0],
            'nim' => $row[1],
            'nama' => $row[2],
            'nama_prodi' => $row[3],
            'nama_fakultas' => $row[4],
            'total' => $row[5],
        ]);
    }
}


