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
        
        // $data = Excel::toArray(new AdminUnivImport, $request->file('file'));
        // print_r($data);
        // print_r($data[0]);

        // foreach($data[0] as $key) {
        //     $n = BeaLolos::find($key[0]);
        //     $n->id_penawaran = $key[1];
        //     $n->nama_prodi = $key[2];
        //     $n->nama_fakultas = $key[3];
        //     $n->nim = $key[4];
        //     $n->nama = $key[5];
        //     $n->semester = $key[6];
        //     $n->status_ayah = $key[7];
        //     $n->status_ibu = $key[8];
        //     $n->status_rumah = $key[9];
        //     $n->penghasilan_ayah = $key[10];
        //     $n->penghasilan_ibu = $key[11];
        //     $n->pekerjaan_ayah = $key[12];
        //     $n->pekerjaan_ibu = $key[13];
        //     $n->pendidikan_ayah = $key[43];
        //     $n->pendidikan_ibu = $key[15];
        //     $n->jumlah_tanggungan = $key[16];

        // $n->save();
		// alihkan halaman kembali
        return redirect()->action([PenetapanController::class, 'index']);
        }
	}