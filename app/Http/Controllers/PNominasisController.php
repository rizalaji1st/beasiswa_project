<?php

namespace App\Http\Controllers;

use App\{PNominasi, Nrangking,Adminuniv,Pendaftaran};
use App\Exports\AdminUnivExport;
use App\Imports\AdminUnivImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PNominasisController extends Controller
{
    public function index()
    {

        $pnominasi = PNominasi::all();
         return view('pages.admin.univ.dashboard_pnominasi',['dashboard_pnominasi' => $pnominasi]);

        // $siswa = Siswa::all();
        // return view('siswa',['siswa'=>$siswa]);
    }


    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_pnominasi',$nama_file);

        // import data
        Excel::import(new AdminUnivImport, public_path('/file_pnominasi/'.$nama_file));

        // notifikasi dengan session
        Session::flash('sukses','Data Pengusulan Nominasi Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/pnominasi');
    }
    // public function upload(){
    //     $pnominasi = PNominasi::get();
    //     return view('upload',['pnominasi' => $pnominasi]);
    // }

    // public function proses_upload(Request $request){
    //     $this->validate($request, [
    //         'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
    //         'keterangan' => 'required',
    //     ]);

    //     // menyimpan data file yang diupload ke variabel $file
    //     $file = $request->file('file');

    //     $nama_file = time()."_".$file->getClientOriginalName();

    //             // isi dengan nama folder tempat kemana file diupload
    //     $tujuan_upload = 'data_file';
    //     $file->move($tujuan_upload,$nama_file);

    //     PNominasi::create([
    //         'file' => $nama_file,
    //         'keterangan' => $request->keterangan,
    //     ]);

    //     return redirect()->back();
    }

