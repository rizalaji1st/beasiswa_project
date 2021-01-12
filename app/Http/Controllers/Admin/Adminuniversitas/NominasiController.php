<?php

namespace App\Http\Controllers\Admin\Adminuniversitas;

use App\Http\Controllers\Controller;
use App\{Penawaran, Mahasiswa, Pendaftaran, PendaftarPenawaran, BeaPenawaranKriteria, PenawaranUpload, Status, User};
use App\Status\{ StatusRumah, Tanggungan, PekerjaanAyah, PekerjaanIbu, PendidikanAyah, PendidikanIbu, PenghasilanAyah, PenghasilanIbu, StatusAyah, StatusIbu};
use App\References\RefFakultas;
use App\References\RefProdi;
use App\References\RefJenisBeasiswa;
use App\Status\BeaStatus;
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
        $beasiswas = Penawaran::orderBy('id_penawaran', 'ASC')->get();;
                                                            //nama variabel => nama data
        return view('pages.admin.universitas.nominasi.index', ['beasiswas' => $beasiswas]);
        //dump('pages.admin.universitas.nominasi.index', ['beasiswas' => $beasiswas]);
    } 

    public function show($nomi)
    {
        $result=[];
        $limit = Penawaran::with('pendaftaran')->where('id_penawaran', $nomi)->first()->jml_kuota;
        $pendaftaran = Pendaftaran::where('id_penawaran', $nomi)->limit($limit)->get();
        foreach ($pendaftaran as $n)
        {
            $status=BeaStatus::where('id_pendaftar', $n->id_pendaftar)->first();
            if($status != null){
                $tanggungan = Tanggungan::where('id_tanggungan', $status->id_tanggungan)->first();
                $status_rumah = StatusRumah::where('id_status_rumah', $status->id_status_rumah)->first();
                $pekerjaan_ayah = PekerjaanAyah::where('id_pekerjaan_ayah', $status->id_pekerjaan_ayah)->first();
                $pekerjaan_ibu = PekerjaanIbu::where('id_pekerjaan_ibu', $status->id_pekerjaan_ibu)->first();
                $penghasilan_ayah = PenghasilanAyah::where('id_penghasilan_ayah', $status->id_penghasilan_ayah)->first();
                $penghasilan_ibu = PenghasilanIbu::where('id_penghasilan_ibu', $status->id_penghasilan_ibu)->first();
                $pendidikan_ayah = PendidikanAyah::where('id_pendidikan_ayah', $status->id_pendidikan_ayah)->first();
                $pendidikan_ibu = PendidikanIbu::where('id_pendidikan_ibu', $status->id_pendidikan_ibu)->first();
                $status_ayah = StatusAyah::where('id_status_ayah', $status->id_status_ayah)->first();
                $status_ibu = StatusIbu::where('id_status_ibu', $status->id_status_ibu)->first();

                if($tanggungan != null){
                    $result_tanggungan = [
                        'skor' => $tanggungan->skor
                    ];
                    $kriteria_tanggungan=BeaPenawaranKriteria::where('id_kriteria', $tanggungan->id_kriteria)->first();
                    if($kriteria_tanggungan!=null){
                        $bobot_tanggungan = [
                            'bobot'=>$kriteria_tanggungan->bobot
                        ];
                    }
                }

                if($status_rumah != null){
                    $result_status_rumah = [
                        'skor' => $status_rumah->skor
                    ];
                    $kriteria_status_rumah=BeaPenawaranKriteria::where('id_kriteria', $status_rumah->id_kriteria)->first();
                    if($kriteria_status_rumah!=null){
                        $bobot_status_rumah = [
                            'bobot'=>$kriteria_status_rumah->bobot
                        ];
                    }
                }

                if($pekerjaan_ayah != null){
                    $result_pekerjaan_ayah = [
                        'skor' => $pekerjaan_ayah->skor
                    ];
                    $kriteria_pekerjaan_ayah=BeaPenawaranKriteria::where('id_kriteria', $pekerjaan_ayah->id_kriteria)->first();
                    if($kriteria_pekerjaan_ayah!=null){
                        $bobot_pekerjaan_ayah = [
                            'bobot'=>$kriteria_pekerjaan_ayah->bobot
                        ];
                    }
                }

                if($pekerjaan_ibu != null){
                    $result_pekerjaan_ibu = [
                        'skor' => $pekerjaan_ibu->skor
                    ];
                    $kriteria_pekerjaan_ibu=BeaPenawaranKriteria::where('id_kriteria', $pekerjaan_ibu->id_kriteria)->first();
                    if($kriteria_pekerjaan_ibu!=null){
                        $bobot_pekerjaan_ibu = [
                            'bobot'=>$kriteria_pekerjaan_ibu->bobot
                        ];
                    }
                }

                if($penghasilan_ayah != null){
                    $result_penghasilan_ayah = [
                        'skor' => $penghasilan_ayah->skor
                    ];
                    $kriteria_penghasilan_ayah=BeaPenawaranKriteria::where('id_kriteria', $penghasilan_ayah->id_kriteria)->first();
                    if($kriteria_penghasilan_ayah!=null){
                        $bobot_penghasilan_ayah = [
                            'bobot'=>$kriteria_penghasilan_ayah->bobot
                        ];
                    }
                }

                if($penghasilan_ibu != null){
                    $result_penghasilan_ibu = [
                        'skor' => $penghasilan_ibu->skor
                    ];
                    $kriteria_penghasilan_ibu=BeaPenawaranKriteria::where('id_kriteria', $penghasilan_ibu->id_kriteria)->first();
                    if($kriteria_penghasilan_ibu!=null){
                        $bobot_penghasilan_ibu = [
                            'bobot'=>$kriteria_penghasilan_ibu->bobot
                        ];
                    }
                }

                if($pendidikan_ayah != null){
                    $result_pendidikan_ayah = [
                        'skor' => $pendidikan_ayah->skor
                    ];
                    $kriteria_pendidikan_ayah=BeaPenawaranKriteria::where('id_kriteria', $pendidikan_ayah->id_kriteria)->first();
                    if($kriteria_pendidikan_ayah!=null){
                        $bobot_pendidikan_ayah = [
                            'bobot'=>$kriteria_pendidikan_ayah->bobot
                        ];
                    }
                }

                if($pendidikan_ibu != null){
                    $result_pendidikan_ibu = [
                        'skor' => $pendidikan_ibu->skor
                    ];
                    $kriteria_pendidikan_ibu=BeaPenawaranKriteria::where('id_kriteria', $pendidikan_ibu->id_kriteria)->first();
                    if($kriteria_pendidikan_ibu!=null){
                        $bobot_pendidikan_ibu = [
                            'bobot'=>$kriteria_pendidikan_ibu->bobot
                        ];
                    }
                }

                if($status_ayah != null){
                    $result_status_ayah = [
                        'skor' => $status_ayah->skor
                    ];
                    $kriteria_status_ayah=BeaPenawaranKriteria::where('id_kriteria', $status_ayah->id_kriteria)->first();
                    if($kriteria_status_ayah!=null){
                        $bobot_status_ayah = [
                            'bobot'=>$kriteria_status_ayah->bobot
                        ];
                    }
                }

                if($status_ibu != null){
                    $result_status_ibu = [
                        'skor' => $status_ibu->skor
                    ];
                    $kriteria_status_ibu=BeaPenawaranKriteria::where('id_kriteria', $status_ibu->id_kriteria)->first();
                    if($kriteria_status_ibu!=null){
                        $bobot_status_ibu = [
                            'bobot'=>$kriteria_status_ibu->bobot
                        ];
                    }
                }

                $result[] = [
                    'id_pendaftar' => $n->id_pendaftar,
                    'tanggungan' => $result_tanggungan,
                    'status_rumah' => $result_status_rumah,
                    'pekerjaan_ayah' => $result_pekerjaan_ayah,
                    'pekerjaan_ibu' => $result_pekerjaan_ibu,
                    'penghasilan_ayah' => $result_penghasilan_ayah,
                    'penghasilan_ibu' => $result_penghasilan_ibu,
                    'pendidikan_ayah' => $result_pendidikan_ayah,
                    'pendidikan_ibu' => $result_pendidikan_ibu,
                    'status_ayah' => $result_status_ayah,
                    'status_ibu' => $result_status_ibu,
                    
                    'kriteria_tanggungan' => $bobot_tanggungan,
                    'kriteria_status_rumah' => $bobot_status_rumah,
                    'kriteria_pekerjaan_ayah' => $bobot_pekerjaan_ayah,
                    'kriteria_pekerjaan_ibu' => $bobot_pekerjaan_ibu,
                    'kriteria_penghasilan_ayah' => $bobot_penghasilan_ayah,
                    'kriteria_penghasilan_ibu' => $bobot_penghasilan_ibu,
                    'kriteria_pendidikan_ayah' => $bobot_pendidikan_ayah,
                    'kriteria_pendidikan_ibu' => $bobot_pendidikan_ibu,
                    'kriteria_status_ayah' => $bobot_status_ayah,
                    'kriteria_status_ibu' => $bobot_status_ibu
                ];
            }

            $hasil[] = ($result_tanggungan['skor'] * $bobot_tanggungan['bobot'])+
                        ($result_status_rumah['skor']* $bobot_status_rumah['bobot'])+
                        ($result_penghasilan_ayah['skor']* $bobot_penghasilan_ayah['bobot'])+
                        ($result_penghasilan_ibu['skor']* $bobot_penghasilan_ibu['bobot'])+
                        ($result_pendidikan_ayah['skor']* $bobot_pendidikan_ayah['bobot'])+
                        ($result_pendidikan_ibu['skor']* $bobot_pendidikan_ibu['bobot'])+
                        ($result_status_ayah['skor']* $bobot_status_ayah['bobot'])+
                        ($result_status_ibu['skor']* $bobot_status_ibu['bobot'])+
                        ($result_pekerjaan_ayah['skor']* $bobot_pekerjaan_ayah['bobot'])+
                        ($result_pekerjaan_ibu['skor']* $bobot_pekerjaan_ibu['bobot'])
                        ; 
        }
        array_multisort($hasil, SORT_DESC, $hasil);
        return view('pages.admin.universitas.nominasi.show', compact('pendaftaran', 'hasil', 'status', 'result'));
    
    }


    public function detail_skor($id)
    {
        $pendaftaran = Pendaftaran::where('id_pendaftar', $id)->get();
        foreach ($pendaftaran as $n)
        {
            $status=BeaStatus::where('id_pendaftar', $n->id_pendaftar)->first();
            if($status != null){
                $tanggungan = Tanggungan::where('id_tanggungan', $status->id_tanggungan)->first();
                $status_rumah = StatusRumah::where('id_status_rumah', $status->id_status_rumah)->first();
                $pekerjaan_ayah = PekerjaanAyah::where('id_pekerjaan_ayah', $status->id_pekerjaan_ayah)->first();
                $pekerjaan_ibu = PekerjaanIbu::where('id_pekerjaan_ibu', $status->id_pekerjaan_ibu)->first();
                $penghasilan_ayah = PenghasilanAyah::where('id_penghasilan_ayah', $status->id_penghasilan_ayah)->first();
                $penghasilan_ibu = PenghasilanIbu::where('id_penghasilan_ibu', $status->id_penghasilan_ibu)->first();
                $pendidikan_ayah = PendidikanAyah::where('id_pendidikan_ayah', $status->id_pendidikan_ayah)->first();
                $pendidikan_ibu = PendidikanIbu::where('id_pendidikan_ibu', $status->id_pendidikan_ibu)->first();
                $status_ayah = StatusAyah::where('id_status_ayah', $status->id_status_ayah)->first();
                $status_ibu = StatusIbu::where('id_status_ibu', $status->id_status_ibu)->first();

                if($tanggungan != null){
                    $result_tanggungan = [
                        'skor' => $tanggungan->skor
                    ];
                    $kriteria_tanggungan=BeaPenawaranKriteria::where('id_kriteria', $tanggungan->id_kriteria)->first();
                    if($kriteria_tanggungan!=null){
                        $bobot_tanggungan = [
                            'bobot'=>$kriteria_tanggungan->bobot
                        ];
                    }
                }

                if($status_rumah != null){
                    $result_status_rumah = [
                        'skor' => $status_rumah->skor
                    ];
                    $kriteria_status_rumah=BeaPenawaranKriteria::where('id_kriteria', $status_rumah->id_kriteria)->first();
                    if($kriteria_status_rumah!=null){
                        $bobot_status_rumah = [
                            'bobot'=>$kriteria_status_rumah->bobot
                        ];
                    }
                }

                if($pekerjaan_ayah != null){
                    $result_pekerjaan_ayah = [
                        'skor' => $pekerjaan_ayah->skor
                    ];
                    $kriteria_pekerjaan_ayah=BeaPenawaranKriteria::where('id_kriteria', $pekerjaan_ayah->id_kriteria)->first();
                    if($kriteria_pekerjaan_ayah!=null){
                        $bobot_pekerjaan_ayah = [
                            'bobot'=>$kriteria_pekerjaan_ayah->bobot
                        ];
                    }
                }

                if($pekerjaan_ibu != null){
                    $result_pekerjaan_ibu = [
                        'skor' => $pekerjaan_ibu->skor
                    ];
                    $kriteria_pekerjaan_ibu=BeaPenawaranKriteria::where('id_kriteria', $pekerjaan_ibu->id_kriteria)->first();
                    if($kriteria_pekerjaan_ibu!=null){
                        $bobot_pekerjaan_ibu = [
                            'bobot'=>$kriteria_pekerjaan_ibu->bobot
                        ];
                    }
                }

                if($penghasilan_ayah != null){
                    $result_penghasilan_ayah = [
                        'skor' => $penghasilan_ayah->skor
                    ];
                    $kriteria_penghasilan_ayah=BeaPenawaranKriteria::where('id_kriteria', $penghasilan_ayah->id_kriteria)->first();
                    if($kriteria_penghasilan_ayah!=null){
                        $bobot_penghasilan_ayah = [
                            'bobot'=>$kriteria_penghasilan_ayah->bobot
                        ];
                    }
                }

                if($penghasilan_ibu != null){
                    $result_penghasilan_ibu = [
                        'skor' => $penghasilan_ibu->skor
                    ];
                    $kriteria_penghasilan_ibu=BeaPenawaranKriteria::where('id_kriteria', $penghasilan_ibu->id_kriteria)->first();
                    if($kriteria_penghasilan_ibu!=null){
                        $bobot_penghasilan_ibu = [
                            'bobot'=>$kriteria_penghasilan_ibu->bobot
                        ];
                    }
                }

                if($pendidikan_ayah != null){
                    $result_pendidikan_ayah = [
                        'skor' => $pendidikan_ayah->skor
                    ];
                    $kriteria_pendidikan_ayah=BeaPenawaranKriteria::where('id_kriteria', $pendidikan_ayah->id_kriteria)->first();
                    if($kriteria_pendidikan_ayah!=null){
                        $bobot_pendidikan_ayah = [
                            'bobot'=>$kriteria_pendidikan_ayah->bobot
                        ];
                    }
                }

                if($pendidikan_ibu != null){
                    $result_pendidikan_ibu = [
                        'skor' => $pendidikan_ibu->skor
                    ];
                    $kriteria_pendidikan_ibu=BeaPenawaranKriteria::where('id_kriteria', $pendidikan_ibu->id_kriteria)->first();
                    if($kriteria_pendidikan_ibu!=null){
                        $bobot_pendidikan_ibu = [
                            'bobot'=>$kriteria_pendidikan_ibu->bobot
                        ];
                    }
                }

                if($status_ayah != null){
                    $result_status_ayah = [
                        'skor' => $status_ayah->skor
                    ];
                    $kriteria_status_ayah=BeaPenawaranKriteria::where('id_kriteria', $status_ayah->id_kriteria)->first();
                    if($kriteria_status_ayah!=null){
                        $bobot_status_ayah = [
                            'bobot'=>$kriteria_status_ayah->bobot
                        ];
                    }
                }

                if($status_ibu != null){
                    $result_status_ibu = [
                        'skor' => $status_ibu->skor
                    ];
                    $kriteria_status_ibu=BeaPenawaranKriteria::where('id_kriteria', $status_ibu->id_kriteria)->first();
                    if($kriteria_status_ibu!=null){
                        $bobot_status_ibu = [
                            'bobot'=>$kriteria_status_ibu->bobot
                        ];
                    }
                }

                $result[] = [
                    'id_pendaftar' => $n->id_pendaftar,
                    'tanggungan' => $result_tanggungan,
                    'status_rumah' => $result_status_rumah,
                    'pekerjaan_ayah' => $result_pekerjaan_ayah,
                    'pekerjaan_ibu' => $result_pekerjaan_ibu,
                    'penghasilan_ayah' => $result_penghasilan_ayah,
                    'penghasilan_ibu' => $result_penghasilan_ibu,
                    'pendidikan_ayah' => $result_pendidikan_ayah,
                    'pendidikan_ibu' => $result_pendidikan_ibu,
                    'status_ayah' => $result_status_ayah,
                    'status_ibu' => $result_status_ibu,
                    
                    'kriteria_tanggungan' => $bobot_tanggungan,
                    'kriteria_status_rumah' => $bobot_status_rumah,
                    'kriteria_pekerjaan_ayah' => $bobot_pekerjaan_ayah,
                    'kriteria_pekerjaan_ibu' => $bobot_pekerjaan_ibu,
                    'kriteria_penghasilan_ayah' => $bobot_penghasilan_ayah,
                    'kriteria_penghasilan_ibu' => $bobot_penghasilan_ibu,
                    'kriteria_pendidikan_ayah' => $bobot_pendidikan_ayah,
                    'kriteria_pendidikan_ibu' => $bobot_pendidikan_ibu,
                    'kriteria_status_ayah' => $bobot_status_ayah,
                    'kriteria_status_ibu' => $bobot_status_ibu
                ];
            }
            $skor_tanggungan[] = ($result_tanggungan['skor']); $bobot_tanggungan[] = ($bobot_tanggungan['bobot']); 
            $skor_rumah[] = ($result_status_rumah['skor']); $bobot_rumah[] = ($bobot_status_rumah['bobot']);
            $skor_pengAyah[] = ($result_penghasilan_ayah['skor']); $bobot_pengAyah[] = ($bobot_penghasilan_ayah['bobot']); 
            $skor_pengIbu[] = ($result_penghasilan_ibu['skor']); $bobot_pengIbu[] = ($bobot_penghasilan_ibu['bobot']); 
            $skor_pendAyah[] = ($result_pendidikan_ayah['skor']); $bobot_pendAyah[] = ($bobot_pendidikan_ayah['bobot']); 
            $skor_pendIbu[] = ($result_pendidikan_ibu['skor']); $bobot_pendIbu[] = ($bobot_pendidikan_ibu['bobot']); 
            $skor_staAyah[] = ($result_status_ayah['skor']); $bobot_staAyah[] = ($bobot_status_ayah['bobot']); 
            $skor_staIbu[] = ($result_status_ibu['skor']); $bobot_staIbu[] = ($bobot_status_ibu['bobot']); 
            $skor_pekAyah[] = ($result_pekerjaan_ayah['skor']); $bobot_pekAyah[] = ($bobot_pekerjaan_ayah['bobot']); 
            $skor_pekIbu[] = ($result_pekerjaan_ibu['skor']); $bobot_pekIbu[] = ($bobot_pekerjaan_ibu['bobot']); 
            
            $hasil_tanggungan[] = ($result_tanggungan['skor'] * $bobot_tanggungan['bobot']);
            $hasil_rumah[] = ($result_status_rumah['skor']* $bobot_status_rumah['bobot']);
            $hasil_pengAyah[] = ($result_penghasilan_ayah['skor']* $bobot_penghasilan_ayah['bobot']);
            $hasil_pengIbu[] = ($result_pendidikan_ibu['skor']* $bobot_pendidikan_ibu['bobot']);
            $hasil_pendAyah[] = ($result_pendidikan_ayah['skor']* $bobot_pendidikan_ayah['bobot']);
            $hasil_pendIbu[] = ($result_pendidikan_ibu['skor']* $bobot_pendidikan_ibu['bobot']);
            $hasil_staAyah[] = ($result_status_ayah['skor']* $bobot_status_ayah['bobot']);
            $hasil_staIbu[] = ($result_status_ibu['skor']* $bobot_status_ibu['bobot']);
            $hasil_pekAyah[] = ($result_pekerjaan_ayah['skor']* $bobot_pekerjaan_ayah['bobot']);
            $hasil_pekIbu[] = ($result_pekerjaan_ibu['skor']* $bobot_pekerjaan_ibu['bobot']);


            $skor = 'skor';
            $bobot = 'bobot';
            $hasil[] = ($result_tanggungan['skor'] * $bobot_tanggungan['bobot'])+
                        ($result_status_rumah['skor']* $bobot_status_rumah['bobot'])+
                        ($result_penghasilan_ayah['skor']* $bobot_penghasilan_ayah['bobot'])+
                        ($result_penghasilan_ibu['skor']* $bobot_penghasilan_ibu['bobot'])+
                        ($result_pendidikan_ayah['skor']* $bobot_pendidikan_ayah['bobot'])+
                        ($result_pendidikan_ibu['skor']* $bobot_pendidikan_ibu['bobot'])+
                        ($result_status_ayah['skor']* $bobot_status_ayah['bobot'])+
                        ($result_status_ibu['skor']* $bobot_status_ibu['bobot'])+
                        ($result_pekerjaan_ayah['skor']* $bobot_pekerjaan_ayah['bobot'])+
                        ($result_pekerjaan_ibu['skor']* $bobot_pekerjaan_ibu['bobot'])
                        ; 
        }
        //return $res_tangg;
        //return $bobot_tanggungan[$bobot];
        return view('pages.admin.universitas.nominasi.detail_skor', compact(
            'pendaftaran', 'hasil',
            'skor_tanggungan', 'bobot_tanggungan', 'skor_rumah', 'bobot_rumah', 'skor_pengAyah', 'bobot_pengAyah', 'skor_pengIbu', 'bobot_pengIbu', 'skor_pendAyah', 'bobot_pendAyah', 'skor_pendIbu', 'bobot_pendIbu', 'skor_staAyah', 'bobot_staAyah', 'skor_staIbu', 'bobot_staIbu', 'skor_pekAyah', 'bobot_pekAyah', 'bobot_pekIbu', 'skor_pekIbu',  
            'hasil_tanggungan', 'hasil_rumah', 'hasil_pengAyah', 'hasil_pengIbu', 'hasil_pendAyah', 'hasil_pendIbu', 'hasil_staAyah', 'hasil_staIbu', 'hasil_pekAyah', 'hasil_pekIbu'
            )
        );
    }
    

    public function export_excel()
    {
        // $pendaftaran = Pendaftaran::where('id_penawaran')->get();
        // return Excel::download(new AdminUnivExport(1), 'Nominasi-calon-beasiswa.xlsx');

        $pendaftaran = Pendaftaran::where('id_penawaran')->get();
        return Excel::download(new AdminUnivExport(1), 'Nominasi-calon-beasiswa.xlsx');
    }
}