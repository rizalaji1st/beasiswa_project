<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Adminuniv;
use App\PenawaranUpload;
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

//one to many Penawaran -> post
    public function post()
    {
        return $this->hasMany(Post::class);
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
        
        
        $penawaran = $request->all();

        $penawaran['tahun'] = $request->tgl_awal_penawaran;
        $penawaranCreate = Adminuniv::create($penawaran);
        
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
        return redirect('/adminuniversitas')->with('success','Data berhasil dihapus');
    }
}
