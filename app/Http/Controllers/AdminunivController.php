<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Adminuniv;
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
        //
        $request->validate([
            'nama_penawaran' => 'required|max:255',
            'jml_kuota'=> 'required',
            'tgl_awal_penawaran'=>'required|date',
            'tgl_akhir_penawaran'=>'required|date|after:tgl_awal_penawaran',
            'tgl_awal_pendaftaran'=>'required|date|after:tgl_awal_penawaran',
            'tgl_akhir_pendaftaran'=>'required|date|after:tgl_awal_pendaftaran',
            'tgl_awal_verifikasi'=>'required|date|after:tgl_awal_pendaftaran',
            'tgl_akhir_verifikasi'=>'required|date|after:tgl_verifikasi_awal|after:tgl_akhir_pendaftaran',
            'tgl_awal_penetapan'=>'required|date|after:tgl_akhir_verifikasi',
            'tgl_akhir_penetapan'=>'required|date|after:tgl_awal_penetapan',
            'tgl_pengumuman'=>'required|date|after:tgl_akhir_penetapan',
            'ips'=>'required|min:1|max:4',
            'ipk'=>'required|min:1|max:4',
            'min_semester'=>'required|integer|min:1|max:8',
            'max_semester'=>'required|integer|min:1|max:8|gt:min_semester',
            'max_penghasilan'=>'required',
            'deskripsi' => 'required'


        ]);
        Adminuniv::create($request->all());
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
    public function update(Request $request, Adminuniv $adminuniv)
    {
        //

        //
        $request->validate([
            'nama_penawaran' => 'required|max:255',
            'jml_kuota'=> 'required',
            'tgl_awal_penawaran'=>'required|date',
            'tgl_akhir_penawaran'=>'required|date|after:tgl_awal_penawaran',
            'tgl_awal_pendaftaran'=>'required|date|after:tgl_awal_penawaran',
            'tgl_akhir_pendaftaran'=>'required|date|after:tgl_awal_pendaftaran',
            'tgl_awal_verifikasi'=>'required|date|after:tgl_awal_pendaftaran',
            'tgl_akhir_verifikasi'=>'required|date|after:tgl_verifikasi_awal|after:tgl_akhir_pendaftaran',
            'tgl_awal_penetapan'=>'required|date|after:tgl_akhir_verifikasi',
            'tgl_akhir_penetapan'=>'required|date|after:tgl_awal_penetapan',
            'tgl_pengumuman'=>'required|date|after:tgl_akhir_penetapan',
            'ips'=>'required|min:1|max:4',
            'ipk'=>'required|min:1|max:4',
            'min_semester'=>'required|integer|min:1|max:8',
            'max_semester'=>'required|integer|min:1|max:8|gt:min_semester',
            'max_penghasilan'=>'required',
        ]);

        echo $adminuniv->id_penawaran;

        Adminuniv::where('id_penawaran', $adminuniv->id_penawaran)
            ->update([
                    'nama_penawaran'=>$request->nama_penawaran,
                    'jml_kuota'=>$request->jml_kuota,
                    'tgl_awal_penawaran'=>$request->tgl_awal_penawaran,
                    'tgl_akhir_penawaran'=>$request->tgl_akhir_penawaran,
                    'tgl_awal_pendaftaran'=>$request->tgl_awal_pendaftaran,
                    'tgl_akhir_pendaftaran'=>$request->tgl_akhir_pendaftaran,
                    'tgl_awal_verifikasi'=>$request->tgl_awal_verifikasi,
                    'tgl_akhir_verifikasi'=>$request->tgl_akhir_verifikasi,
                    'tgl_awal_penetapan'=>$request->tgl_awal_penetapan,
                    'tgl_akhir_penetapan'=>$request->tgl_akhir_penetapan,
                    'tgl_pengumuman'=>$request->tgl_pengumuman,
                    'min_semester'=>$request->min_semester,
                    'max_semester'=>$request->max_semester,
                    'max_penghasilan'=>$request->max_penghasilan,
                    'ips' => $request->ips,
                    'ipk' => $request->ipk,
                    'deskripsi' => $request->deskripsi
                    ]);
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
