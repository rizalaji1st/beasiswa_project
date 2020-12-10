<?php

namespace App\Http\Controllers\Admin\Adminuniversitas;

use App\Http\Controllers\Controller;
use App\{Penawaran, Mahasiswa, Pendaftaran, PendaftarPenawaran, BeaPenawaranKriteria, PenawaranUpload, Status};
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
//use Illuminate\Contracts\View\AdminUnivExport;
use App\Exports\AdminUnivExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
// use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

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
                                                            //nama variabel => nama data
        return view('pages.admin.universitas.nominasi.index', ['beasiswas' => $beasiswas]);
        //dump('pages.admin.universitas.nominasi.index', ['beasiswas' => $beasiswas]);
    } 

    public function show($nominasi)
    {

        $nominasi = Pendaftaran::where('id_penawaran', $nominasi)->get();
    //     DB::enableQueryLog();
    //     //$nominasi = PendaftarPenawaran::where('id_penawaran', $nominasi)->get();
    //     $limit = DB::table('bea_penawaran')->join('bea_pendaftar_penawaran', 'bea_penawaran.id_penawaran', 
    //     '=', 'bea_pendaftar_penawaran.id_penawaran')
    //     ->where('bea_pendaftar_penawaran.id_penawaran', $nominasi)
    //     ->first()->jml_kuota;
    //     $nominasi = DB::table('bea_pendaftar_penawaran')->where('bea_pendaftar_penawaran.id_penawaran', $nominasi)
    //     ->join('bea_mahasiswa', 'bea_mahasiswa.nim', '=', 'bea_pendaftar_penawaran.nim')
    //     ->join('bea_ref_prodi', 'bea_ref_prodi.id_prodi', '=', 'bea_mahasiswa.id_prodi')
    //     ->join('bea_ref_fakultas', 'bea_ref_fakultas.id_fakultas', '=', 'bea_ref_prodi.id_fakultas')

    //     ->join('bea_status as a', 'bea_pendaftar_penawaran.id_pendaftar', '=', 'a.id_pendaftar')
    //     ->join('bea_status_ayah as b', 'a.id_status_ayah', '=', 'b.id_status_ayah')
    //     ->join('bea_status_ibu as c', 'a.id_status_ibu', '=', 'c.id_status_ibu')
    //     ->join('bea_pekerjaan_ayah as d', 'a.id_pekerjaan_ayah', '=', 'd.id_pekerjaan_ayah')
    //     ->join('bea_pekerjaan_ibu as e', 'a.id_pekerjaan_ibu', '=', 'e.id_pekerjaan_ibu')
    //     ->join('bea_pendidikan_ayah as f', 'a.id_pendidikan_ayah', '=', 'f.id_pendidikan_ayah')
    //     ->join('bea_pendidikan_ibu as g', 'a.id_pendidikan_ibu', '=', 'g.id_pendidikan_ibu')
    //     ->join('bea_penghasilan_ayah as h', 'a.id_penghasilan_ayah', '=', 'h.id_penghasilan_ayah')
    //     ->join('bea_penghasilan_ibu as i', 'a.id_penghasilan_ibu', '=', 'i.id_penghasilan_ibu')
    //     ->join('bea_status_rumah as j', 'a.id_status_rumah', '=', 'j.id_status_rumah')
    //     ->join('bea_tanggungan as k', 'a.id_tanggungan', '=', 'k.id_tanggungan')
    //     ->join('bea_penawaran_kriteria as l', 'j.id_kriteria', '=', 'l.id_kriteria')
    //     ->join('bea_penawaran_kriteria as m', 'd.id_kriteria', '=', 'm.id_kriteria')
    //     ->join('bea_penawaran_kriteria as n', 'e.id_kriteria', '=', 'n.id_kriteria')
    //     ->join('bea_penawaran_kriteria as o', 'f.id_kriteria', '=', 'o.id_kriteria')
    //     ->join('bea_penawaran_kriteria as p', 'g.id_kriteria', '=', 'p.id_kriteria')
    //     ->join('bea_penawaran_kriteria as q', 'h.id_kriteria', '=', 'q.id_kriteria')
    //     ->join('bea_penawaran_kriteria as r', 'i.id_kriteria', '=', 'r.id_kriteria')
    //     ->join('bea_penawaran_kriteria as s', 'b.id_kriteria', '=', 's.id_kriteria')
    //     ->join('bea_penawaran_kriteria as t', 'c.id_kriteria', '=', 't.id_kriteria')
    //     ->join('bea_penawaran_kriteria as u', 'k.id_kriteria', '=', 'u.id_kriteria')
    //     ->limit($limit)

    //     ->select
    //     (
    //         'bea_pendaftar_penawaran.id_pendaftar',
    //         'bea_mahasiswa.nama',
    //         'bea_ref_fakultas.nama_fakultas', 'bea_ref_prodi.nama_prodi', 'bea_mahasiswa.nim',
    //         'b.skor as status_ayah', 'c.skor as status_ibu', 
    //         'd.skor as pekerjaan_ayah', 'e.skor as pekerjaan_ibu',
    //         'f.skor as pendidikan_ayah', 'g.skor as pendidikan_ibu',
    //         'h.skor as penghasilan_ayah', 'i.skor as penghasilan_ibu',
    //         'j.skor as status_rumah', 'k.skor as tanggungan',
    //         'l.bobot as bobot_rumah', 'm.bobot as bobot_pekerjaan_ayah',
    //         'n.bobot as bobot_pekerjaan_ibu', 'o.bobot as bobot_pendidikan_ayah',
    //         'p.bobot as bobot_pendidikan_ibu', 'q.bobot as bobot_penghasilan_ayah',
    //         'r.bobot as bobot_penghasilan_ibu', 's.bobot as bobot_status_ayah',
    //         't.bobot as bobot_status_ibu', 'u.bobot as bobot_tanggungan',
    //     )
    //     ->selectRaw('((b.skor * s.bobot) + (c.skor * t.bobot) + (d.skor * m.bobot) + (e.skor * n.bobot) + 
    //                   (f.skor * o.bobot) + (g.skor * n.bobot) + (h.skor * q.bobot) + (i.skor * r.bobot) + 
    //                   (j.skor * l.bobot) + (k.skor * u.bobot)) as total')
        
    
    // ->orderBy('total','DESC')
    // ->get();
    return view('pages.admin.universitas.nominasi.show')->with('nominasi', $nominasi);
    }


    public function detail_skor($id)
    {
        DB::enableQueryLog();
        //$nominasi = PendaftarPenawaran::where('id_penawaran', $nominasi)->get();
        // $limit = DB::table('bea_penawaran')->join('bea_pendaftar_penawaran', 'bea_penawaran.id_penawaran', 
        // '=', 'bea_pendaftar_penawaran.id_penawaran')
        // ->where('bea_pendaftar_penawaran.id_penawaran', $nominasi)
        // ->first()->jml_kuota;

        $nominasi = DB::table('bea_pendaftar_penawaran')->where('bea_pendaftar_penawaran.id_penawaran', $id)
        // ->join('bea_mahasiswa', 'users.nim', '=', 'bea_pendaftar_penawaran.nim')
        // ->join('bea_ref_prodi', 'bea_ref_prodi.id_prodi', '=', 'users.id_prodi')
        // ->join('bea_ref_fakultas', 'bea_ref_fakultas.id_fakultas', '=', 'bea_ref_prodi.id_fakultas')

        ->join('id_status as a', 'bea_pendaftar_penawaran.id_pendaftar', '=', 'a.id_pendaftar')
        ->join('bea_status_ayah as b', 'a.id_status_ayah', '=', 'b.id_status_ayah')
        ->join('bea_status_ibu as c', 'a.id_status_ibu', '=', 'c.id_status_ibu')
        ->join('bea_pekerjaan_ayah as d', 'a.id_pekerjaan_ayah', '=', 'd.id_pekerjaan_ayah')
        ->join('bea_pekerjaan_ibu as e', 'a.id_pekerjaan_ibu', '=', 'e.id_pekerjaan_ibu')
        ->join('bea_pendidikan_ayah as f', 'a.id_pendidikan_ayah', '=', 'f.id_pendidikan_ayah')
        ->join('bea_pendidikan_ibu as g', 'a.id_pendidikan_ibu', '=', 'g.id_pendidikan_ibu')
        ->join('bea_penghasilan_ayah as h', 'a.id_penghasilan_ayah', '=', 'h.id_penghasilan_ayah')
        ->join('bea_penghasilan_ibu as i', 'a.id_penghasilan_ibu', '=', 'i.id_penghasilan_ibu')
        ->join('bea_status_rumah as j', 'a.id_status_rumah', '=', 'j.id_status_rumah')
        ->join('bea_tanggungan as k', 'a.id_tanggungan', '=', 'k.id_tanggungan')
        ->join('bea_penawaran_kriteria as l', 'j.id_kriteria', '=', 'l.id_kriteria')
        ->join('bea_penawaran_kriteria as m', 'd.id_kriteria', '=', 'm.id_kriteria')
        ->join('bea_penawaran_kriteria as n', 'e.id_kriteria', '=', 'n.id_kriteria')
        ->join('bea_penawaran_kriteria as o', 'f.id_kriteria', '=', 'o.id_kriteria')
        ->join('bea_penawaran_kriteria as p', 'g.id_kriteria', '=', 'p.id_kriteria')
        ->join('bea_penawaran_kriteria as q', 'h.id_kriteria', '=', 'q.id_kriteria')
        ->join('bea_penawaran_kriteria as r', 'i.id_kriteria', '=', 'r.id_kriteria')
        ->join('bea_penawaran_kriteria as s', 'b.id_kriteria', '=', 's.id_kriteria')
        ->join('bea_penawaran_kriteria as t', 'c.id_kriteria', '=', 't.id_kriteria')
        ->join('bea_penawaran_kriteria as u', 'k.id_kriteria', '=', 'u.id_kriteria')
    

        ->select
        (
            'bea_pendaftar_penawaran.id_pendaftar',
            //'bea_mahasiswa.nama',
            // 'bea_ref_fakultas.nama_fakultas', 'bea_ref_prodi.nama_prodi', 'bea_mahasiswa.nim',
            'b.skor as status_ayah', 'c.skor as status_ibu', 
            'd.skor as pekerjaan_ayah', 'e.skor as pekerjaan_ibu',
            'f.skor as pendidikan_ayah', 'g.skor as pendidikan_ibu',
            'h.skor as penghasilan_ayah', 'i.skor as penghasilan_ibu',
            'j.skor as status_rumah', 'k.skor as tanggungan',
            'l.bobot as bobot_rumah', 'm.bobot as bobot_pekerjaan_ayah',
            'n.bobot as bobot_pekerjaan_ibu', 'o.bobot as bobot_pendidikan_ayah',
            'p.bobot as bobot_pendidikan_ibu', 'q.bobot as bobot_penghasilan_ayah',
            'r.bobot as bobot_penghasilan_ibu', 's.bobot as bobot_status_ayah',
            't.bobot as bobot_status_ibu', 'u.bobot as bobot_tanggungan',
        )
        ->selectRaw('((b.skor * s.bobot) + (c.skor * t.bobot) + (d.skor * m.bobot) + (e.skor * n.bobot) + 
                      (f.skor * o.bobot) + (g.skor * n.bobot) + (h.skor * q.bobot) + (i.skor * r.bobot) + 
                      (j.skor * l.bobot) + (k.skor * u.bobot)) as total')
    ->orderBy('total','DESC')
    ->get();
        return view('pages.admin.universitas.nominasi.detail_skor')->with('detail', $nominasi);
    }
    

    public function export_excel($nominasi)
    {
        DB::enableQueryLog();
        //$nominasi = PendaftarPenawaran::where('id_penawaran', $nominasi)->get();
        $limit = DB::table('bea_penawaran')->join('bea_pendaftar_penawaran', 'bea_penawaran.id_penawaran', 
        '=', 'bea_pendaftar_penawaran.id_penawaran')
        ->where('bea_pendaftar_penawaran.id_penawaran', $nominasi)
        ->first()->jml_kuota;

        $nominasi = DB::table('bea_pendaftar_penawaran')->where('bea_pendaftar_penawaran.id_penawaran', $nominasi)
        ->join('bea_mahasiswa', 'bea_mahasiswa.nim', '=', 'bea_pendaftar_penawaran.nim')
        ->join('bea_ref_prodi', 'bea_ref_prodi.id_prodi', '=', 'bea_mahasiswa.id_prodi')
        ->join('bea_ref_fakultas', 'bea_ref_fakultas.id_fakultas', '=', 'bea_ref_prodi.id_fakultas')

        ->join('id_status as a', 'bea_pendaftar_penawaran.id_pendaftar', '=', 'a.id_pendaftar')
        ->join('bea_status_ayah as b', 'a.id_statusAyah', '=', 'b.id_statusAyah')
        ->join('bea_status_ibu as c', 'a.id_statusIbu', '=', 'c.id_statusIbu')
        ->join('bea_pekerjaan_ayah as d', 'a.id_pekerjaan_Ayah', '=', 'd.id_pekerjaan_Ayah')
        ->join('bea_pekerjaan_ibu as e', 'a.id_pekerjaan_Ibu', '=', 'e.id_pekerjaan_Ibu')
        ->join('bea_pendidikan_ayah as f', 'a.id_pendidikan_Ayah', '=', 'f.id_pendidikan_Ayah')
        ->join('bea_pendidikan_ibu as g', 'a.id_pendidikan_Ibu', '=', 'g.id_pendidikan_Ibu')
        ->join('bea_penghasilan_ayah as h', 'a.id_penghasilan_Ayah', '=', 'h.id_penghasilan_ayah')
        ->join('bea_penghasilan_ibu as i', 'a.id_penghasilan_Ibu', '=', 'i.id_penghasilan_ibu')
        ->join('bea_status_rumah as j', 'a.id_status_rumah', '=', 'j.id_status_rumah')
        ->join('bea_tanggungan as k', 'a.id_tanggungan', '=', 'k.id_tanggungan')
        ->join('bea_penawaran_kriteria as l', 'j.id_kriteria', '=', 'l.id_kriteria')
        ->join('bea_penawaran_kriteria as m', 'd.id_kriteria', '=', 'm.id_kriteria')
        ->join('bea_penawaran_kriteria as n', 'e.id_kriteria', '=', 'n.id_kriteria')
        ->join('bea_penawaran_kriteria as o', 'f.id_kriteria', '=', 'o.id_kriteria')
        ->join('bea_penawaran_kriteria as p', 'g.id_kriteria', '=', 'p.id_kriteria')
        ->join('bea_penawaran_kriteria as q', 'h.id_kriteria', '=', 'q.id_kriteria')
        ->join('bea_penawaran_kriteria as r', 'i.id_kriteria', '=', 'r.id_kriteria')
        ->join('bea_penawaran_kriteria as s', 'b.id_kriteria', '=', 's.id_kriteria')
        ->join('bea_penawaran_kriteria as t', 'c.id_kriteria', '=', 't.id_kriteria')
        ->join('bea_penawaran_kriteria as u', 'k.id_kriteria', '=', 'u.id_kriteria')
        ->limit($limit)

        ->select
        (
            'bea_pendaftar_penawaran.id_pendaftar','bea_mahasiswa.nama',
            'bea_ref_fakultas.nama_fakultas', 'bea_ref_prodi.nama_prodi', 'bea_mahasiswa.nim',
            'b.skor as status_ayah', 'c.skor as status_ibu', 
            'd.skor as pekerjaan_ayah', 'e.skor as pekerjaan_ibu',
            'f.skor as pendidikan_ayah', 'g.skor as pendidikan_ibu',
            'h.skor as penghasilan_ayah', 'i.skor as penghasilan_ibu',
            'j.skor as status_rumah', 'k.skor as tanggungan',
            'l.bobot as bobot_rumah', 'm.bobot as bobot_pekerjaan_ayah',
            'n.bobot as bobot_pekerjaan_ibu', 'o.bobot as bobot_pendidikan_ayah',
            'p.bobot as bobot_pendidikan_ibu', 'q.bobot as bobot_penghasilan_ayah',
            'r.bobot as bobot_penghasilan_ibu', 's.bobot as bobot_status_ayah',
            't.bobot as bobot_status_ibu', 'u.bobot as bobot_tanggungan',
        )
        ->selectRaw('((b.skor * s.bobot) + (c.skor * t.bobot) + (d.skor * m.bobot) + (e.skor * n.bobot) + 
                      (f.skor * o.bobot) + (g.skor * n.bobot) + (h.skor * q.bobot) + (i.skor * r.bobot) + 
                      (j.skor * l.bobot) + (k.skor * u.bobot)) as total')
    ->orderBy('total','DESC')
    ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Id Pendaftar');
        $sheet->setCellValue('B1', 'NIM');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Prodi');
        $sheet->setCellValue('E1', 'Fakultas');
        $sheet->setCellValue('F1', 'Skor');

        $rows = 2;

        foreach($nominasi as $data){
            $sheet->setCellValue('A' . $rows, $data->id_pendaftar);
            $sheet->setCellValue('B' . $rows, $data->nim);
            $sheet->setCellValue('C' . $rows, $data->nama);
            $sheet->setCellValue('D' . $rows, $data->nama_prodi);
            $sheet->setCellValue('E' . $rows, $data->nama_fakultas);
            $sheet->setCellValue('F' . $rows, $data->total);
            $rows++;
        }
        
        $fileName = "emp.xlsx";
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
        $writer->save('php://output');
    }


    
}