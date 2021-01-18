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
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade as PDF;

class PendaftarDashController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth',['except'=>['penawaranIndex']]);
    }

    //penawaran

     public function penawaranIndex()
    {   
        $id = '';
        $user = '';
        if(Auth::check()){
            $id = Auth::user()->id;
            $user = Pendaftaran::where('id_user', '=', $id );
        }
        $beasiswas = Penawaran::all();
        $time = Carbon::now();
        return view('pages.pendaftaran.dashboard.penawaran2.index', compact('beasiswas','user','time'));
        
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
        $user = Pendaftaran::where('id_user', '=', $id );
        $idpen = $Penawaran->id_penawaran;
        $time = Carbon::now();
        $cek = Pendaftaran::where('id_penawaran', '=', $idpen );
        
        return view('pages.pendaftaran.dashboard.penawaran2.upload', compact('Penawaran','user','cek','time'));
        
    }
    public function penawaranCreate(Penawaran $Penawaran, Request $request)
    {   

        
        $this->validate($request, [
                'files.*' => 'required|file|max:5000'
        ]);
        $time = Carbon::now();
        $pendaftaran = Pendaftaran::create([
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
                            'is_finalisasi'=>true,
                            'create_at'=>$time,
                            'create_by'=>Auth::user()->name,
                            'finalized_at'=>$time,
                            'finalized_by'=>Auth::user()->name,
                            'is_verified'=>'menunggu verifikasi',

         ]);       
          
        foreach($Penawaran->lampiranPendaftar as $lamp){
            $nama = "nama".$lamp->id_upload_file;
            
            if($request->hasFile($nama)){
                $file = $request->file($nama);
                $extension = $file->extension();
                    $filename =  Auth::user()->name . '_'.$lamp->refJenisFile->nama_jenis_file. '_' . date('dmyHis') .Str::random(4). '.' . $extension;
                    $path = Storage::putFileAs('public/data_file/pendaftaran_upload', $file, $filename);
                    $size = $file->getSize();
                    FilePendaftar::create([
                        'id_pendaftar' =>$pendaftaran->id_pendaftar,
                        'path_file' => $path,
                        'nama_file' => $filename,
                        'ektensi' => $extension,
                        'size' => $size,
                        'id_jenis_file' => $lamp->refJenisFile->id_jenis_file,
                        'id_upload_file' => $lamp->id_upload_file
                    ]); 
                }
                
            
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
        $buktiDaftar = "Bukti Pendaftaran ". Auth::user()->nama.'.pdf';
	    return $pdf->stream($buktiDaftar);
        
    }

    public function indexPengumuman()
    {
        $beasiswas = Penawaran::all();
        return view('pages.pendaftaran.dashboard.pengumuman.index', compact('beasiswas'));
        
    }
    

}