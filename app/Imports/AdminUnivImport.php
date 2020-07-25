<?php

namespace App\Imports;

use App\NRangking; 
use Maatwebsite\Excel\Concerns\{ToModel, WithHeadingRow};

class AdminUnivImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new NRangking([

            'id_pendaftar' => $row[0],
            'id_penawaran' => $row[1],
            'nim' => $row[2],
            'ips' => $row[3],
            'ipk' => $row[4],
            'penghasilan' => $row[5],
            'semester' => $row[6],
        ]);
    }
}


