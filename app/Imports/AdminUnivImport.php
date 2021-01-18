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
            'id' => $row[0],
            'id_penawaran' =>$row[1],
            'nama_prodi' => $row[2],
            'nama_fakultas' => $row[3],
            'nim' => $row[4],
            'nama' => $row[5],
            'semester' => $row[6],
            'status_ayah' => $row[7],
            'status_ibu' => $row[8],
            'status_rumah' => $row[9],
            'gaji_ayah' => $row[10],
            'gaji_ibu' => $row[11],
            'pekerjaan_ayah' => $row[12],
            'pekerjaan_ibu' => $row[13],
            'pendidikan_ayah' => $row[14],
            'pendidikan_ibu' => $row[15],
            ]);
        }
    }