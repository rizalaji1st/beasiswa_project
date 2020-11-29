<?php

namespace App\Exports;
use App\References\RefKriteria;
use App\{Penawaran, Mahasiswa, Pendaftaran, PendaftarPenawaran, BeaPenawaranKriteria, PenawaranUpload};
use App\Kriteria\{PekerjaanAyahIbu, PendidikanAyahIbu, Penghasilan, StatusAyahIbu, StatusRumah, Tanggungan};
use App\References\RefFakultas;
use App\References\RefProdi;
use App\References\RefJenisBeasiswa;

use Maatwebsite\Excel\Concerns\FromCollection;

class SkorBeasiswaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }
}
