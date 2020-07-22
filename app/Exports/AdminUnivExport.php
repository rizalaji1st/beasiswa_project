<?php

namespace App\Exports;

use App\AdminUnivExcel;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdminUnivExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AdminUnivExcel::all();
    }
}
