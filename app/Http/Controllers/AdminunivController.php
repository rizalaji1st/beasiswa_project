<?php

namespace App\Http\Controllers;

use App\Adminuniv;
use Illuminate\Http\Request;

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

        $adminuniv = new Adminuniv;
        $request->validate([
            'nama_penawaran'=>'required',
            'jml-kuota'=>'required',
            'tgl-awal-pendaftaran'=>'required',
            'tgl-akhir-pendaftaran'=>'required',
            'tgl-awal-penetapan'=>'required',
            'tgl-akhir-penetapan'=>'required',
            'tgl-awal-verifikasi'=>'required',
            'tgl-akhir-verifikasi'=>'required',
            'tgl-pengumuman'=>'required',
            'ips'=>'required',
            'ipk'=>'required',
            'min-semester'=>'required',
            'max-semester'=>'required',
            'max-penghasilan'=>'required'
         ]);
        $adminuniv->save();
        return ($adminuniv);

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
    }
}
