<?php

namespace App\Exports;

use App\Invoice;
use App\PendaftarPenawaran;
use App\AdminUnivExcel;
//use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\Exportable;
// use Maatwebsite\Excel\Facades\Excel;

// use DB;

class AdminUnivExport implements FromView
{
    // use Exportable;

    // public function view(): View
    // {
    //     return view('pages.admin.universitas.nominasi.show', [
    //         'nominasi' => PendaftarPenawaran::all()
    //     ]);
    // }
    public function view($nominasi):view
    {
        // return PendaftarPenawaran::where('id_penawaran', "=", '7')->get();
        $nominasi = DB::table('bea_pendaftar_penawaran')->where('bea_pendaftar_penawaran.id_penawaran', $id_nominasi)
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

    return $nominasi;
    }

    // function __construct($id) {
    //     $this->id = $id;
    //     return $this;
    // }

    // public function collection()
    // {
    //     return PendaftarPenawaran::where('id_penawaran', "=", '9')->get();
    // }

    // public function __construct(int $nim, string $nama, string $nama_prodi, string $nama_fakultas, string $total)
    // {
    //     $this->nim = $nim;
    //     $this->nama = $nama;
    //     $this->nama_prodi = $nama_prodi;
    //     $this->nama_fakultas = $nama_fakultas;
    //     $this->skor = $skor;
    // }

    // public function query()
    // {
    //     return Peserta::query()->select('nim','nama', 'nama_prodi', 'nama_fakultas', 'total')
    //                             ->where('nim','like', '%'.$this->nim.'%')
    //                             ->where('nama', 'like', '%'.$this->nama.'%')
    //                             ->where('nama_prodi','like', '%'.$this->nama_prodi.'%')
    //                             ->where('nama_fakultas','like', '%'.$this->nama_fakultas.'%')
    //                             ->where('total','like', '%'.$this->total.'%')
    //                             ;
    // }
}