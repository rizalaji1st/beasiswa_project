<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use App\FilePendaftar;
use App\UploadFile;
use App\PenawaranUpload;
use App\Penawaran;
use App\Http\Requests\PenawaranRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;



class PendaftarDashController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index()
    {
        return view('pages.pendaftaran.dashboard.index');
        
    }

    //penawaran

     public function penawaranIndex()
    {
        $beasiswas = Penawaran::all();
        return view('pages.pendaftaran.dashboard.penawaran.index', ['beasiswas' => $beasiswas]);
        
    }

    public function penawaranDetail(Penawaran $Penawaran)
    {
        
        return view('pages.pendaftaran.dashboard.penawaran.detail', compact('Penawaran'));
        
    }

    public function penawaranDaftar(Penawaran $Penawaran)
    {
        
        return view('pages.pendaftaran.dashboard.penawaran.daftar', compact('Penawaran'));
        
    }
}