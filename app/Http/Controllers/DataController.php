<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\References\RefFakultas;
use App\PenawaranKuotaFakultas;
use App\{PendaftarPenawaran, Nrangking,Adminuniv,Pendaftaran, Mahasiswa, Prodi, Penawaran};
use App\Exports\AdminUnivExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use \PDF;
use DB;

class DataController extends Controller
{
    public function dashboard(){

         $adminuniv = Adminuniv::all();
         return view('pages.admin.univ.dashboard_monitoring',['dashboard_nrangking' => $adminuniv]);
    }
        public function index($nrangking){
          $nrangking = DB::table('bea_pendaftar_penawaran')->where('id_penawaran', $nrangking)
            ->join('bea_mahasiswa', 'bea_mahasiswa.nim', '=', 'bea_pendaftar_penawaran.nim')
            ->join('bea_ref_prodi', 'bea_ref_prodi.id_prodi', '=', 'bea_mahasiswa.id_prodi')
            ->join('bea_ref_fakultas', 'bea_ref_fakultas.id_fakultas', '=', 'bea_ref_prodi.id_fakultas')
            ->select('bea_pendaftar_penawaran.id_pendaftar','bea_mahasiswa.nama','bea_ref_fakultas.nama_fakultas', 'bea_ref_prodi.nama_prodi', 'bea_mahasiswa.nim')
            ->get();

            return view('pages.admin.univ.dashboard_datamhs')->with('nrank', $nrangking);
    }

    public function cetak_pdf()
    {
         
        $nrangking = Mahasiswa::all();
        $pdf = PDF::loadview('pages.admin.univ.calon_pdf',['nrank'=>$nrangking]);
        return $pdf->download('daftar-calon-beasiswa.pdf');
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
    public function show()
    {
        $jenisPenawaran = Penawaran::get();
        return view('pages.admin.univ.show_hasil', compact('jenisPenawaran'));
    }


        public function export_excel()
    {
        //return Excel::download(new AdminUnivExport, 'Nominasi_Rangking_Univ.xlsx');
        return Excel::download(new AdminUnivExport(1), 'tes.xlsx');
    }


    public function dashboard_hasil(){

         $adminuniv = Adminuniv::all();
         return view('pages.admin.univ.dashboard_hasil',['dashboard_nrangking' => $adminuniv]);
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
