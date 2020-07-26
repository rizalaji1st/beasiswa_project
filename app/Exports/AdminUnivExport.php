<?php

namespace App\Exports;

use App\NRangking;
use App\Invoice;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use App\AdminUnivExcel;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdminUnivExport implements FromCollection
{
    protected $id;

    function __construct($id) {
           $this->id = $id;
    }

   public function collection()
   {
       return NRangking::where('id_penawaran',$this->id)->get();
   }
}
