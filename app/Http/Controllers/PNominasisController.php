<?php

namespace App\Http\Controllers;

use App\{PNominasi, Nrangking,Adminuniv,Pendaftaran};
use App\Exports\AdminUnivExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PNominasisController extends Controller
{
    public function upload(){
        $pnominasi = PNominasi::get();
        return view('upload',['pnominasi' => $pnominasi]);
    }
 
    public function proses_upload(Request $request){
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'required',
        ]);
 
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
 
        $nama_file = time()."_".$file->getClientOriginalName();
 
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);
 
        PNominasi::create([
            'file' => $nama_file,
            'keterangan' => $request->keterangan,
        ]);
 
        return redirect()->back();
    }
}
