<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use App\FilePendaftar;
use App\UploadFile;
use App\PenawaranUpload;
use App\Penawaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
// use Haruncpi\LaravelIdGenerator\IdGenerator;
use PDF;

class PendaftarDashController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index()
    {
        $beasiswas = Penawaran::all();
        $id = Auth::user()->id;
        $beasiswa_anda = Pendaftaran::where('id_user', $id);
        return view('pages.pendaftaran.dashboard.index2', compact('beasiswas','beasiswa_anda'));
        
    }

    //penawaran

     public function penawaranIndex()
    {
        $id = Auth::user()->id;
        $user = Pendaftaran::where('id_user', '=', $id );
        $beasiswas = Penawaran::all();
        return view('pages.pendaftaran.dashboard.penawaran2.index', compact('beasiswas','user'));
        
    }

    public function penawaranDetail(Penawaran $Penawaran)
    {
        $id = Auth::user()->id;
        $idpen = $Penawaran->id_penawaran;
        $user = Pendaftaran::where('id_user', '=', $id );
        $cek = Pendaftaran::where('id_penawaran', '=', $idpen );
        
        return view('pages.pendaftaran.dashboard.penawaran2.detail', compact('Penawaran','user','cek'));
        
    }

    public function penawaranDaftar(Penawaran $Penawaran)
    {
        
        return view('pages.pendaftaran.dashboard.penawaran.daftar', compact('Penawaran'));
        
    }
    public function penawaranUpload(Penawaran $Penawaran)
    {
        $id = Auth::user()->id;
        $bea = Pendaftaran::where('id_penawaran', '=', $id );
        $user = Pendaftaran::where('id_user', '=', $id );
        $idpen = $Penawaran->id_penawaran;
        $cek = Pendaftaran::where('id_penawaran', '=', $idpen );
        return view('pages.pendaftaran.dashboard.penawaran2.upload', compact('Penawaran','user','cek'));
        
    }
    public function penawaranCreate(Penawaran $Penawaran, Request $request)
    {   

        // $data = $request->all();
        
    
        $daftar =Pendaftaran::create([
                            'id_penawaran'=>$Penawaran->id_penawaran,
                            'id_user'=>Auth::user()->id,
                            'nim'=>Auth::user()->nim,
                            'ips'=>Auth::user()->ips, 
                            'ipk'=>Auth::user()->ipk, 
                            'penghasilan'=>Auth::user()->penghasilan, 
                            'semester'=>Auth::user()->semester,
                            'status_ayah'=>Auth::user()->status_ayah,
                            'status_ibu'=>Auth::user()->status_ibu,
                            'status_rumah'=>Auth::user()->status_rumah,
                            'pendidikan_ayah'=>Auth::user()->pend_ayah,
                            'pendidikan_ibu'=>Auth::user()->pend_ibu,
                            'pekerjaan_ayah'=>Auth::user()->pekerjaan_ayah,
                            'pekerjaan_ibu'=>Auth::user()->pekerjaan_ibu,
                            'gaji_ayah'=>Auth::user()->gaji_ayah,
                            'gaji_ibu'=>Auth::user()->gaji_ibu,
                            'jumlah_tanggungan'=>Auth::user()->jml_tanggungan,
                            // 'is_finalisasi'=>1,
         ]);

        $daftar->save();

        
        $pendaftaran =  Pendaftaran::select('id_pendaftar')->get();

        $id_terakhir = $pendaftaran->last();

        $this->validate($request, [
        'files.*' => 'required|file|max:5000'
            ]);

        if($request->hasfile('files'))
         {
            foreach($request->file('files') as $file)
            {
                foreach ($Penawaran->lampiranPendaftar as $row) {
                      
                    $extension = $file->extension();
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename =  pathinfo($filenameWithExt, PATHINFO_FILENAME) . '_' . date('dmyHis') . '.' . $extension;
                    
                    $path = Storage::putFileAs('public/data_file/pendaftaran_upload', $file, $filename);
                    
                    $size = $file->getSize();
                    $id_jenis_file = $row->refJenisFile->id_jenis_file;
                    $id_upload_file = $row->id_upload_file;
                    
                    
                    // $upload->$FilePendaftar->pendaftarUpload()->associate($daftar);
                    
                }
                FilePendaftar::create([
                            // 'id_jenis_file' => $data['id_jenis_file'],
                            // 'id_upload_file' => $datas['id_upload_file'],
                            'id_pendaftar'=> $id_terakhir['id_pendaftar'],
                            'path_file' => $path,
                            'nama_file' => $filename,
                            'ektensi' => $extension,
                            'size' => $size,
                            'id_jenis_file' => $id_jenis_file,
                            'id_upload_file' => $id_upload_file
                        ]);
                    
            }; 
            }

            
         return redirect('/pendaftar/penawaran/upload/' . $Penawaran->id_penawaran)->with('success-stisla', 'Pendaftaran Beasiswa Berhasil');

    }

    public function cetakPdf(Penawaran $Penawaran)
    {
        $now = Carbon::now();
        $pdf = PDF::loadview('pages.pendaftaran.dashboard.penawaran.pdf', [
            'Penawaran'=>$Penawaran,
            'now'=> $now
        ]);
	    return $pdf->stream("Bukti Pendaftaran.pdf");
        
    }
    

}