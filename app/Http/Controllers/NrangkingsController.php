<?php

namespace App\Http\Controllers;

use App\{Nrangking,Adminuniv,Pendaftaran};
use App\Exports\AdminUnivExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NrangkingsController extends Controller
{

        public function index(){
         //$adminuniv = DB::table('bea_pendaftar_penawaran')->orderBy('ips', 'DESC');      
        $adminuniv = Adminuniv::all();
         return view('pages.admin.univ.dashboard_nrangking',['dashboard_nrangking' => $adminuniv]);
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
     * @param  \App\Nrangking  $nrangking
     * @return \Illuminate\Http\Response
     */
    public function show($nrangking)
    {
        $nrangking = Pendaftaran::where('id_penawaran', $nrangking)->orderBy('ips','desc')->get(); 

        return view('pages.admin.univ.show_nrangking')->with('nrank', $nrangking);
    }


        public function export_excel()
    {
        //$nrangking = Pendaftaran::where('id_penawaran', $nrangking);
        return Excel::download(new AdminUnivExport, 'Nominasi_Rangking_Univ.xlsx');
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
