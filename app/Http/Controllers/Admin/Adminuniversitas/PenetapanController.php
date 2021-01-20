<?php

namespace App\Http\Controllers\Admin\Adminuniversitas;

use App\Http\Controllers\Controller;
use App\{Penawaran, Mahasiswa, Pendaftaran, PendaftarPenawaran, BeaPenawaranKriteria, PenawaranUpload, BeaLolos};
use App\Kriteria\{PekerjaanAyahIbu, PendidikanAyahIbu, Penghasilan, StatusAyahIbu, StatusRumah, Tanggungan};
use App\References\RefFakultas;
use App\References\RefProdi;
use App\References\RefJenisBeasiswa;
use App\Http\Requests\PenawaranRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\References\RefKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\SkorBeasiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AdminUnivImport;
use Session;
use DB;

class PenetapanController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $beasiswas = Penawaran::orderBy('id_penawaran', 'ASC')->get();
        return view('pages.admin.universitas.penetapan.index', ['bea' => $beasiswas]);
    }


    public function show($nomi)
    {
        $limit = Penawaran::with('pendaftaran')->where('id_penawaran', $nomi)->first()->jml_kuota;
        $lolos = BeaLolos::where('id_penawaran', $nomi)->limit($limit)->get();
        return view('pages.admin.universitas.penetapan.show', ['lolos'=>$lolos]);
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
    $file->move('file_siswa',$nama_file);

    // import data
    Excel::import(new AdminUnivImport, public_path('/file_siswa/'.$nama_file));

    // notifikasi dengan session
    Session::flash('sukses','Data Siswa Berhasil Diimport!');
        return redirect()->action([PenetapanController::class, 'index']);
        }
	}