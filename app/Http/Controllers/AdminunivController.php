<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Adminuniv;
use App\PenawaranUpload;
use App\PenawaranKuotaFakultas;
use App\Http\Requests\PenawaranRequest;
use Illuminate\Http\Request;
use PDOStatement;

class AdminunivController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $beasiswas = Adminuniv::all();
        return view('pages.admin.univ.dashboard', ['beasiswas'=>$beasiswas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.univ.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //mengambil semua data
        $penawaran = $request->all();
        $penawaran['tahun'] = $request->tgl_awal_penawaran;
        
        //jika memilih custom kuota fakultas
        if($request->jml_kuota == 0 || $request->jml_kuota == null){
            $fakultas = [
                "01"=>$request->fkip,
                "02"=>$request->fk,
                "03"=>$request->fmipa,
                "04"=>$request->fp,
                "05"=>$request->ft,
                "06"=>$request->fib,
                "07"=>$request->feb,
                "08"=>$request->fh,
                "09"=>$request->fsrd,
                "010"=>$request->fisip,
                "011"=>$request->fkor
            ];
        
            $jml_kuota = 0;
            foreach ($fakultas as $item=>$value) {
                if($item !=0) {
                    $jml_kuota += $value;
                }
            }
            $penawaran['jml_kuota'] = $jml_kuota;
            
            //insert data ke bea_penawaran
            $penawaranCreate = Adminuniv::create($penawaran);

            foreach ($fakultas as $item=>$value) {
                $penawaranCreate->getKuotaFakultas()->create([
                    'id_fakultas' => $item,
                    'jml_kuota' => $value
                ]);
            }
        }
        else {
            $penawaranCreate = Adminuniv::create($penawaran);
        }

        

        //menambahkan lampiran
        if($request->myCount != null) {
            $lampiran = $request->myCount;
            $lampiranArr = explode(",",$lampiran);
            
            foreach ($lampiranArr as $lamp) {

                if ($lamp != null) {
                    $penawaranCreate->penawaranUpload()->create([
                        'id_jenis_file' => '12',
                        'nama_upload' => $request->$lamp
                    ]);
                }
            };   
        };
        
        return redirect('/adminuniversitas')->with('success', 'Data Penawaran Beasiswa Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Adminuniv  $adminuniv
     * @return \Illuminate\Http\Response
     */
    public function show(Adminuniv $adminuniv)
    {
        //
        return view('pages.admin.univ.show', compact('adminuniv'));
        return redirect('/adminuniversitas')->with('success', 'Data Penawaran Beasiswa Berhasil Ditambahkan');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adminuniv  $adminuniv
     * @return \Illuminate\Http\Response
     */
    public function edit(Adminuniv $adminuniv)
    {
        //
        return view('pages.admin.univ.update', compact('adminuniv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Adminuniv  $adminuniv
     * @return \Illuminate\Http\Response
     */
    public function update(PenawaranRequest $request, Adminuniv $adminuniv)
    {

        $penawaran = $request->all();
        $penawaran['tahun'] = $request->tgl_awal_penawaran;

        //update penawaran
        $penawaranUpdate = Adminuniv::findOrFail($adminuniv->id_penawaran);
        $penawaranUpdate->update($penawaran);

        $hasil = [];
        $dlampiran = $request->dmyCount;
        $i = 1;
        $dlampiran+=1;

        //update lampiran yang sudah ada
        foreach ($adminuniv->penawaranUpload as $item) {
            $nama = "dlampiran". $i;
            $hasil[$item->id_penawaran_upload] = $request->$nama;
            

            if($hasil[$item->id_penawaran_upload] == null) {
                PenawaranUpload::destroy($item->id_penawaran_upload);
            }
            else if ($hasil[$item->id_penawaran_upload] != $item->nama_upload){
                PenawaranUpload::where('id_penawaran_upload', $item->id_penawaran_upload )
                    ->update([
                        'nama_upload'=> $hasil[$item->id_penawaran_upload]
                    ]);
            }

            $i+=1;
        }
        
        if($request->myCount != null) {
            $lampiran = $request->myCount;
            $lampiranArr = explode(",",$lampiran);
            
            //menambahkan lampiran baru
            foreach ($lampiranArr as $lamp) {
                if ($lamp != null) {
                    $penawaranUpdate->penawaranUpload()->create([
                        'id_jenis_file' => '12',
                        'nama_upload' => $request->$lamp
                    ]);
                }
            };
        };

        //mengubah kuota fakultas ke kuota fakultas
        if ($request->fakultas1 != null) {
            $i=1;
            $jml_kuota = 0;
            foreach ($adminuniv->getKuotaFakultas as $item) {
                $name = "fakultas".$i;
                if($request->$name == null){
                    PenawaranKuotaFakultas::where('id_penawaran_kuota_fakultas', $item->id_penawaran_kuota_fakultas )
                        ->update([
                            'jml_kuota'=> 0
                        ]);
                }
                else {
                    PenawaranKuotaFakultas::where('id_penawaran_kuota_fakultas', $item->id_penawaran_kuota_fakultas )
                        ->update([
                            'jml_kuota'=> $request->$name
                        ]);
                    $jml_kuota += $request->$name;
                }
                $i+=1;
            }
            $penawaranUpdate->update([
                'jml_kuota' => $jml_kuota
            ]);

            if($request->is_total == "true"){
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
        if($request->is_fakultas == "true"){ //error here
            $fakultas = [
                "01"=>$request->fkip,
                "02"=>$request->fk,
                "03"=>$request->fmipa,
                "04"=>$request->fp,
                "05"=>$request->ft,
                "06"=>$request->fib,
                "07"=>$request->feb,
                "08"=>$request->fh,
                "09"=>$request->fsrd,
                "010"=>$request->fisip,
                "011"=>$request->fkor
            ];
        
            $jml_kuota = 0;
            foreach ($fakultas as $item=>$value) {
                if($item !=0) {
                    $jml_kuota += $value;
                }
            }

            $penawaranUpdate->update([
                'jml_kuota' => $jml_kuota
                ]);

            foreach ($fakultas as $item=>$value) {
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

        return redirect('/adminuniversitas/'.$adminuniv->id_penawaran)->with('success', 'Data Penawaran Beasiswa Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adminuniv  $adminuniv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adminuniv $adminuniv)
    {
        //
        Adminuniv::destroy($adminuniv->id_penawaran);
        foreach ($adminuniv->penawaranUpload as $item) {
            PenawaranUpload::destroy($item->id_penawaran_upload);
        }

        foreach ($adminuniv->getKuotaFakultas as $item) {
            PenawaranKuotaFakultas::destroy($item->id_penawaran_kuota_fakultas);
        }
        return redirect('/adminuniversitas')->with('success','Data berhasil dihapus');
    }
}
