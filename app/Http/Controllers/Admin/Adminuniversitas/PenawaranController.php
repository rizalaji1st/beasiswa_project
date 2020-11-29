<?php

namespace App\Http\Controllers\Admin\Adminuniversitas;
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
    }
use App\Http\Controllers\Controller;
use App\Penawaran;
use App\BeaPenawaranKriteria;
use App\PenawaranUpload;
use App\PenawaranKuotaFakultas;
use App\Http\Requests\PenawaranRequest;
use App\References\RefFakultas;
use App\References\RefJenisBeasiswa;
use App\References\RefJenisFile; 
use App\UploadFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\References\RefKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenawaranController extends Controller
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
        //
        $beasiswas = Penawaran::all();
        return view('pages.admin.universitas.penawaran.index', ['beasiswas' => $beasiswas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jenisBeasiswa = RefJenisBeasiswa::get();
        $lampiran = RefJenisFile::get();
        $kriteria = RefKriteria::get();
        $years = range(Carbon::now()->year-5,Carbon::now()->year+4);
        return view('pages.admin.universitas.penawaran.create', compact('jenisBeasiswa', 'lampiran','kriteria','years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenawaranRequest $request)
    {
        //mengambil semua data
        $penawaran = $request->all();
        $penawaran['tahun'] = $request->tgl_awal_penawaran;
        $penawaran['id_user_pembuat'] = Auth::user()->id; 
        if($request->is_double == null){
            $penawaran['is_double']='false';
        }else {
            $penawaran['is_double']=$request->is_double;
        }

        //jika memilih custom kuota fakultas
        if ($request->jml_kuota == 0 || $request->jml_kuota == null) {
            $fakultas = [
                "01" => $request->fkip,
                "02" => $request->fk,
                "03" => $request->fmipa,
                "04" => $request->fp,
                "05" => $request->ft,
                "06" => $request->fib,
                "07" => $request->feb,
                "08" => $request->fh,
                "09" => $request->fsrd,
                "010" => $request->fisip,
                "011" => $request->fkor
            ];

            $jml_kuota = 0;
            foreach ($fakultas as $item => $value) {
                if ($item != 0) {
                    $jml_kuota += $value;
                }
            }
            $penawaran['jml_kuota'] = $jml_kuota;

            //insert data ke bea_penawaran 
            $penawaranCreate = Penawaran::create($penawaran);

            foreach ($fakultas as $item => $value) {
                $penawaranCreate->getKuotaFakultas()->create([
                    'id_fakultas' => $item,
                    'jml_kuota' => $value
                ]);
            }
        } else {
            $penawaranCreate = Penawaran::create($penawaran);
        }

        //menambahkan lampiran pendaftar
        if ($request->myCountPendaftar != null) {
            $lampiran = $request->myCountPendaftar;
            $lampiranArr = explode(",", $lampiran);
            foreach ($lampiranArr as $lamp) {
                if ($lamp != null) {
                    $penawaranCreate->lampiranPendaftar()->create([
                        'id_penawaran' => $penawaranCreate->id_penawaran,
                        'id_jenis_file' => $request->$lamp
                    ]);
                }
            }
        }

        //menambahkan bobot penilaian
        if ($request->myCountPenilaian != null) {
            $kriteria = $request->myCountPenilaian;
            $kriteriaArr = explode(",", $kriteria);
            foreach ($kriteriaArr as $kriteria) {
                $bobot = $kriteria . "Bobot";
                if ($kriteria != null) {
                    $penawaranCreate->kriteriaPenilaian()->create([
                        'id_penawaran' => $penawaranCreate->id_penawaran,
                        'nama_kriteria' => $request->$kriteria,
                        'bobot' => $request->$bobot,
                    ]);
                }
            }
        }

        // menambahkan lampiran penawaran
        if ($request->myCount != null) {
            $lampiran = $request->myCount;
            $lampiranArr = explode(",", $lampiran);
            foreach ($lampiranArr as $lamp) {
                $upload = $lamp . "Upload";
                $nama = $lamp . "Name";
                $deskripsi = $lamp . "Deskripsi";
                if ($lamp != null) {

                    //upload file
                    $extension = $request->file($upload)->extension();
                    $size = $request->file($upload)->getSize();
                    $filenameWithExt = $request->file($upload)->getClientOriginalName();
                    $filename =  pathinfo($filenameWithExt, PATHINFO_FILENAME) . '_' . date('dmyHis') . '.' . $extension;
                    $this->validate($request, [$upload => 'required|file|max:5000']);
                    $path = Storage::putFileAs('public/data_file/penawaran_upload', $request->file($upload), $filename);
                    $penawaranCreate->penawaranUpload()->create([
                        'id_jenis_file' => $request->$lamp,
                        'id_penawaran' => $penawaranCreate->id_penawaran,
                        'deskripsi' => $request->$deskripsi,
                        'path_file' => $path,
                        'nama_file' => $filename,
                        'ekstensi' => $extension,
                        'size' => $size,
                        'nama_upload' => $request->$nama,
                    ]);
                }
            };
        };
        return redirect('/admin/penawarans')->with('success', 'Data Penawaran Beasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penawaran  $penawaran
     * @return \Illuminate\Http\Response
     */
    public function show(Penawaran $penawaran)
    {  
        $fakultas = PenawaranKuotaFakultas::with('refFakultas')->where('id_penawaran',$penawaran->id_penawaran)->get();
        $lampiranPendaftar = UploadFile::with('refJenisFile')->where('id_penawaran',$penawaran->id_penawaran)->get();
        return view('pages.admin.universitas.penawaran.show', compact('penawaran','fakultas','lampiranPendaftar'));
        return redirect('/admin/penawarans')->with('success', 'Data Penawaran Beasiswa Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penawaran  $penawaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Penawaran $penawaran)
    {
        //
        $jenisBeasiswa = RefJenisBeasiswa::get();
        $refJenisFile = RefJenisFile::get();
        $kriteria = RefKriteria::get();
        $refFakultas = RefFakultas::get();
        $years = range(Carbon::now()->year-5,Carbon::now()->year+4);
        return view('pages.admin.universitas.penawaran.update', compact('penawaran', 'jenisBeasiswa', 'refJenisFile', 'refFakultas','kriteria','years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penawaran  $penawaran
     * @return \Illuminate\Http\Response
     */
    public function update(PenawaranRequest $request, Penawaran $penawaran)
    {

        $penawaran2 = $request->all();
        $penawaran2['tahun'] = $request->tgl_awal_penawaran;
        if($request->is_double == null){
            $penawaran2['is_double']='false';
        }else {
            $penawaran2['is_double']=$request->is_double;
        }

        //update penawaran
        $penawaranUpdate = Penawaran::findOrFail($penawaran->id_penawaran);
        $penawaranUpdate->update($penawaran2);

        $hasil = [];
        $hasilPendaftar = [];
        $hasilPenilaian = [];
        $dlampiran = $request->dmyCount;
        $dLampiranPendaftar = $request->dmyCountPendaftar;
        $dLampiranPenilaian = $request->dmyCountPenilaian;
        $i = 1;
        $iPendaftar = 1;
        $iPenilaian = 1;
        $dLampiranPendaftar += 1;
        $dLampiranPenilaian += 1;
        $dlampiran += 1;

        //update lampiran pendaftar yang sudah ada
        foreach($penawaran->lampiranPendaftar as $item){
            $nama = "lampiranPendaftarAda" . $iPendaftar;
            $hasilPendaftar[$item->id_jenis_file] = $request->$nama;

            if ($hasilPendaftar[$item->id_jenis_file] == null) {
                UploadFile::destroy($item->id_upload_file);
            } else {
                if ($hasilPendaftar[$item->id_jenis_file] != $item->id_jenis_file) {
                    UploadFile::where('id_upload_file', $item->id_upload_file)
                        ->update([
                            'id_jenis_file' => $hasilPendaftar[$item->id_jenis_file]
                        ]);
                }
            }
            $iPendaftar += 1;
        }

        //update lampiran yang sudah ada
        foreach ($penawaran->penawaranUpload as $item) {
            $nama = "lampiranAda" . $i;
            $uploadSebagai = "lampiranAda" . $i . "Name";
            $deskripsi = "lampiranAda" . $i . "Deskripsi";
            $upload = "lampiranAda" . $i . "Upload";

            $hasil[$item->id_jenis_file] = $request->$nama;
            $hasil[$item->nama_upload] = $request->$uploadSebagai;
            $hasil[$item->deskripsi] = $request->$deskripsi;


            if ($hasil[$item->id_jenis_file] == null) {
                PenawaranUpload::destroy($item->id_penawaran_upload);
            } else {
                if ($hasil[$item->id_jenis_file] != $item->id_jenis_file) {
                    //upload file
                    PenawaranUpload::where('id_penawaran_upload', $item->id_penawaran_upload)
                        ->update(array('id_jenis_file' => $hasil[$item->id_jenis_file]));
                }
                if ($item->nama_upload != $hasil[$item->nama_upload]) {
                    PenawaranUpload::where('id_penawaran_upload', $item->id_penawaran_upload)
                        ->update(array('nama_upload' => $hasil[$item->nama_upload]));
                }
                if ($item->deskripsi != $hasil[$item->deskripsi]) {
                    PenawaranUpload::where('id_penawaran_upload', $item->id_penawaran_upload)
                        ->update(array('deskripsi' => $hasil[$item->deskripsi]));
                }
                if ($request->$upload != null) {
                    //upload file
                    Storage::delete($item->path_file);
                    $extension = $request->file($upload)->extension();
                    $size = $request->file($upload)->getSize();
                    $filename = date('dmyHis') . Str::random(4) . '.' . $extension;
                    $this->validate($request, [$upload => 'required|file|max:5000']);
                    $path = Storage::putFileAs('public/data_file/penawaran_upload', $request->file($upload), $filename);
                    PenawaranUpload::where('id_penawaran_upload', $item->id_penawaran_upload)->update([
                        'path_file' => $path,
                        'nama_file' => $filename,
                        'ekstensi' => $extension,
                        'size' => $size,
                    ]);
                }
            }
            $i += 1;
        }

        //menambahkan lampiran pendaftar
        if ($request->myCountPendaftar != null) {
            $lampiran = $request->myCountPendaftar;
            $lampiranArr = explode(",", $lampiran);
            foreach ($lampiranArr as $lamp) {
                if ($lamp != null) {
                    $penawaranUpdate->lampiranPendaftar()->create([
                        'id_penawaran' => $penawaranUpdate->id_penawaran,
                        'id_jenis_file' => $request->$lamp
                    ]);
                }
            }
        }

        //menambah lampiran baru
        if ($request->myCount != null) {
            $lampiran = $request->myCount;
            $lampiranArr = explode(",", $lampiran);
            foreach ($lampiranArr as $lamp) {
                $upload = $lamp . "Upload";
                $nama = $lamp . "Name";
                $deskripsi = $lamp . "Deskripsi";
                if ($lamp != null) {

                    //upload file
                    $extension = $request->file($upload)->extension();
                    $size = $request->file($upload)->getSize();
                    $filename = date('dmyHis') . '.' . $extension;
                    $this->validate($request, [$upload => 'required|file|max:5000']);
                    $path = Storage::putFileAs('public/data_file/penawaran_upload', $request->file($upload), $filename);
                    $penawaranUpdate->penawaranUpload()->create([
                        'id_jenis_file' => $request->$lamp,
                        'id_penawaran' => $penawaranUpdate->id_penawaran,
                        'deskripsi' => $request->$deskripsi,
                        'path_file' => $path,
                        'nama_file' => $filename,
                        'ekstensi' => $extension,
                        'size' => $size,
                        'nama_upload' => $request->$nama,
                    ]);
                }
            };
        };

        //update penilaian yang sudah ada
        foreach($penawaran->kriteriaPenilaian as $item){
            $nama = "penilaianAda".$iPenilaian;
            $bobot = "penilaianAda".$iPenilaian."Bobot";
            $hasilPenilaian[$item->nama_kriteria] = $request->$nama;
            $hasilPenilaian[$item->bobot] = $request->$bobot;

            if ($hasilPenilaian[$item->nama_kriteria] == null) {
                BeaPenawaranKriteria::destroy($item->id_kriteria);
            } else {
                if ($hasilPenilaian[$item->nama_kriteria] != $item->nama_kriteria) {
                    BeaPenawaranKriteria::where('id_kriteria', $item->id_kriteria)
                        ->update(array('nama_kriteria' => $hasilPenilaian[$item->nama_kriteria]));
                }
                if ($hasilPenilaian[$item->bobot] != $item->bobot) {
                    BeaPenawaranKriteria::where('id_kriteria', $item->id_kriteria)
                        ->update(array('bobot' => $hasilPenilaian[$item->bobot]));
                }
            }
            $iPenilaian++;
        }

        //menambahkan bobot penilaian
        if ($request->myCountPenilaian != null) {
            $kriteria = $request->myCountPenilaian;
            $kriteriaArr = explode(",", $kriteria);
            foreach ($kriteriaArr as $kriteria) {
                $bobot = $kriteria . "Bobot";
                if ($kriteria != null) {
                    $penawaranUpdate->kriteriaPenilaian()->create([
                        'id_penawaran' => $penawaranUpdate->id_penawaran,
                        'nama_kriteria' => $request->$kriteria,
                        'bobot' => $request->$bobot,
                    ]);
                }
            }
        }

        //mengubah kuota fakultas ke kuota fakultas
        if ($request->fakultas1 != null) {
            $i = 1;
            $jml_kuota = 0;
            foreach ($penawaran->getKuotaFakultas as $item) {
                $name = "fakultas" . $i;
                if ($request->$name == null) {
                    PenawaranKuotaFakultas::where('id_penawaran_kuota_fakultas', $item->id_penawaran_kuota_fakultas)
                        ->update([
                            'jml_kuota' => 0
                        ]);
                } else {
                    PenawaranKuotaFakultas::where('id_penawaran_kuota_fakultas', $item->id_penawaran_kuota_fakultas)
                        ->update([
                            'jml_kuota' => $request->$name
                        ]);
                    $jml_kuota += $request->$name;
                }
                $i += 1;
            }
            $penawaranUpdate->update([
                'jml_kuota' => $jml_kuota
            ]);

            if ($request->is_total == "true") {
                //mengubah dari kuota fakultas ke kuota umum
                foreach ($penawaranUpdate->getKuotaFakultas as $item) {
                    PenawaranKuotaFakultas::destroy($item->id_penawaran_kuota_fakultas);
                    $penawaranUpdate->update([
                        'jml_kuota' => $request->jml_kuota
                    ]);
                }
            }
        }

        //mengubah dari kuota umum ke kuota fakultas
        if ($request->is_fakultas == "true") { //error here
            $fakultas = [
                "01" => $request->fkip,
                "02" => $request->fk,
                "03" => $request->fmipa,
                "04" => $request->fp,
                "05" => $request->ft,
                "06" => $request->fib,
                "07" => $request->feb,
                "08" => $request->fh,
                "09" => $request->fsrd,
                "010" => $request->fisip,
                "011" => $request->fkor
            ];

            $jml_kuota = 0;
            foreach ($fakultas as $item => $value) {
                if ($item != 0) {
                    $jml_kuota += $value;
                }
            }

            $penawaranUpdate->update([
                'jml_kuota' => $jml_kuota
            ]);

            foreach ($fakultas as $item => $value) {
                if ($value == null) {
                    $penawaranUpdate->getKuotaFakultas()->create([
                        'id_fakultas' => $item,
                        'jml_kuota' => 0
                    ]);
                } else {
                    $penawaranUpdate->getKuotaFakultas()->create([
                        'id_fakultas' => $item,
                        'jml_kuota' => $value
                    ]);
                }
            }
        }

        return redirect('/admin/penawarans/' . $penawaran->id_penawaran)->with('success', 'Data Penawaran Beasiswa Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penawaran  $penawaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penawaran $penawaran)
    {
        //hapus penawaran
        Penawaran::destroy($penawaran->id_penawaran);
        
        //hapus penawaran upload
        foreach ($penawaran->penawaranUpload as $item) {
            PenawaranUpload::destroy($item->id_penawaran_upload);

            //untuk delete file jika dihapus
            // Storage::delete($item->path_file);
        }

        // hapus kuota fakultas
        foreach ($penawaran->getKuotaFakultas as $item) {
            PenawaranKuotaFakultas::destroy($item->id_penawaran_kuota_fakultas);
        }

        //hapus lampiran pendaftar
        foreach ($penawaran->lampiranPendaftar as $item) {
            UploadFile::destroy($item->id_upload_file);
        }
        //hapus lampiran pendaftar
        foreach ($penawaran->kriteriaPenilaian as $item) {
            BeaPenawaranKriteria::destroy($item->id_kriteria);
        }

        return redirect('admin/penawarans')->with('success','Data berhasil dihapus');
    }
}
