<?php

namespace App\Imports;

use App\PNominasi;
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
        return new PNominasi([
            'id_pendaftar' => $row[1],
            'id_penawaran' => $row[2], 
            'nim' => $row[3],
            'ips' => $row[4],
            'ipk' => $row[5],
            'penghasilan' => $row[6],
            'semester' => $row[7],
        ]);
    }
}
