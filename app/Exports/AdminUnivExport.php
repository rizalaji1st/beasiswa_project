<?php

namespace App\Exports;

use App\Invoice;
use App\Pendaftaran;
use App\Penawaran;
use App\Status\BeaStatus;
use App\AdminUnivExcel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;


    class AdminUnivExport implements FromView
    {
        protected $id;

        
        function __construct($id) {
            $this->id = $id;
        }

        public function view(): View{
        // $limit = Penawaran::with('pendaftaran')->where('id_penawaran')->first()->jml_kuota;
        $pendaftaran = Pendaftaran::where('id_penawaran',$this->id)->get();
        return view('pages.admin.universitas.nominasi.excel_lolos', compact('pendaftaran'));
    }
    }