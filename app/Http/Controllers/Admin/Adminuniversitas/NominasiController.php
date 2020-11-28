<?php

namespace App\Http\Controllers\Admin\Adminuniversitas;

use App\Http\Controllers\Controller;
use App\{Penawaran, Mahasiswa, Pendaftaran, PendaftarPenawaran, BeaPenawaranKriteria, PenawaranUpload};
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
use DB;

class NominasiController extends Controller
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
    public function index()
    { 
        $beasiswas = Penawaran::all();
        return view('pages.admin.universitas.nominasi.index', ['beasiswas' => $beasiswas]);
        //dump('pages.admin.universitas.nominasi.index', ['beasiswas' => $beasiswas]);
    } 

    public function show($nominasi)
    {
        //$nominasi = PendaftarPenawaran::where('id_penawaran', $nominasi)->get();

        $nominasi = DB::table('bea_pendaftar_penawaran')->where('id_penawaran', $nominasi)
        ->join('bea_mahasiswa', 'bea_mahasiswa.nim', '=', 'bea_pendaftar_penawaran.nim')
        ->join('bea_ref_prodi', 'bea_ref_prodi.id_prodi', '=', 'bea_mahasiswa.id_prodi')
        ->join('bea_ref_fakultas', 'bea_ref_fakultas.id_fakultas', '=', 'bea_ref_prodi.id_fakultas')
        ->join('id_status as a', 'bea_pendaftar_penawaran.id_pendaftar', '=', 'a.id_pendaftar')

        ->join('bea_status_ayah_ibu as b', 'a.id_statusAyah', '=', 'b.id_statusAyahIbu')
        ->join('bea_status_ayah_ibu as c', 'a.id_statusIbu', '=', 'c.id_statusAyahIbu')
        ->join('bea_pekerjaan_ayah_ibu as d', 'a.id_pekerjaan_Ayah', '=', 'd.id_pekerjaan_AyahIbu')
        ->join('bea_pekerjaan_ayah_ibu as e', 'a.id_pekerjaan_Ibu', '=', 'e.id_pekerjaan_AyahIbu')
        ->join('bea_pendidikan_ayah_ibu as f', 'a.id_pendidikan_Ayah', '=', 'f.id_pendidikan_AyahIbu')
        ->join('bea_pendidikan_ayah_ibu as g', 'a.id_pendidikan_Ibu', '=', 'g.id_pendidikan_AyahIbu')
        ->join('bea_penghasilan as h', 'a.id_penghasilan_Ayah', '=', 'h.id_penghasilan')
        ->join('bea_penghasilan as i', 'a.id_penghasilan_Ibu', '=', 'i.id_penghasilan')
        ->join('bea_status_rumah as j', 'a.id_status_rumah', '=', 'j.id_status_rumah')
        ->join('bea_tanggungan as k', 'a.id_tanggungan', '=', 'k.id_tanggungan')


        ->select
        (
            'bea_pendaftar_penawaran.id_pendaftar','bea_mahasiswa.nama',
            'bea_ref_fakultas.nama_fakultas', 'bea_ref_prodi.nama_prodi', 'bea_mahasiswa.nim',
            'b.skor as status_ayah', 'c.skor as status_ibu', 
            'd.skor as pekerjaan_ayah', 'e.skor as pekerjaan_ibu',
            'f.skor as pendidikan_ayah', 'g.skor as pendidikan_ibu',
            'h.skor as penghasilan_ayah', 'i.skor as penghasilan_ibu',
            'j.skor as status_rumah', 'k.skor as tanggungan',
        
        )
        //->orderBy('total', 'desc')
        ->get();
        return view('pages.admin.universitas.nominasi.show')->with('nominasi', $nominasi);
    }
}
