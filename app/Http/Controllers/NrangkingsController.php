<?php

namespace App\Http\Controllers;

use App\{Nrangking,Penawaran,Pendaftaran};
use App\Exports\AdminUnivExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NRangkingsController extends Controller
{

        public function index(){
         //$penawaran = DB::table('bea_pendaftar_penawaran')->orderBy('ips', 'DESC');
        $penawaran = Penawaran::all();
         return view('pages.admin.universitas.dashboard_nrangking',['dashboard_nrangking' => $penawaran]);
   }


    public function create()
    {
        return view('nrangkings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //INSERT = STORE
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NRangking  $nrangking
     * @return \Illuminate\Http\Response
     */
    public function show($nrangking)
    {
        $nrangking = Pendaftaran::where('id_penawaran', $nrangking)->orderBy('ips','desc')->get();

        return view('pages.admin.universitas.show_nrangking')->with('nrank', $nrangking);
    }


        public function export_excel()
    {
        //return Excel::download(new AdminUnivExport, 'Nominasi_Rangking_Univ.xlsx');
        return Excel::download(new AdminUnivExport(1), 'tes.xlsx');
    }


    public function edit(Nrangking $nrangking)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nrangking  $nrangking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nrangking $nrangking)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nrangking  $nrangking
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

    }
}
