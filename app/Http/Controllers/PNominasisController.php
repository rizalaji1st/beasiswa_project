<?php

namespace App\Http\Controllers;

use Session;
use App\{NRangking,Penawaran,Pendaftaran};
use App\Exports\AdminUnivExport;
use App\Imports\AdminUnivImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PNominasisController extends Controller
{
    public function index()
    {

        // $bppdata = ["id_pendaftar", "id_penawaran", "nim", "ips", "ipk", "penghasilan", "semester"];
        // $idbpp = [$bppdata, 0];

        // foreach ($idbpp[0] as $bppdata) {
        //     $user = Users::find($bppdata);
            
        //     $user ->prodi = $key[1];
        //     $user ->fakultas = $key[2];  
        // }
        // return view('pages.admin.universitas.dashboard_pnominasi',['dashboard_pnominasi' => $nrangking]);

        $nrangking = NRangking::all();
         return view('pages.admin.universitas.dashboard_pnominasi',['dashboard_pnominasi' => $nrangking]);
    }


    public function import_excel(Request $request)
    {

        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        // $file = $request->file('file');

        // membuat nama file unik
        // $nama_file = rand().$file->getClientOriginalName();

        // upload ke folder file_pnominasi di dalam folder public
        // $file->move('file_pnominasi',$nama_file);


        // notifikasi dengan session
        Session::flash('sukses','Data Pengusulan Nominasi Berhasil Diimport!');

        // NRangking::truncate();
        // $data = Excel::import(new AdminUnivImport, public_path('/file_pnominasi/'.$nama_file));

        $data = Excel::toArray(new AdminUnivImport, $request->file('file'));
        print_r($data);
        print_r($data[0]);

         foreach($data[0] as $key) {
            $nrangking = Nrangking::find($key[0]);
            $nrangking->id_penawaran = $key[1];
            $nrangking->nim = $key[2];
            $nrangking->ips = $key[3];
            $nrangking->ipk = $key[4];
            $nrangking->penghasilan = $key[5];
            $nrangking->semester = $key[6];

             $nrangking->save();

        }

    // alihkan halaman kembali
        return redirect('/pnominasis');
    }

}