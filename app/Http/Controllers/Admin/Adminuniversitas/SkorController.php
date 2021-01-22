<?php

namespace App\Http\Controllers\Admin\Adminuniversitas;

use App\References\RefSkor;
use App\References\RefKriteria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SkorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $refKriterias = RefKriteria::all();
        $refSkor = RefSkor::all();
        return view('pages.admin.universitas.skor.tambah_skor', compact('refKriterias', 'refSkor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $kriteria = RefKriteria::all();
        //$kriteria = RefKriteria::create($request->all());
        // $kriteria->RefKriteria()->sync($request->input('id_jenis_kriteria', []));
        // if($request->isMethod('post')){
        //     return $request->roles;
        // }
        RefSkor::create([
            //'id_skor'=>$request->id_skor,
            'id_jenis_kriteria'=>$request->id_jenis_kriteria,
            'nama_skor'=>$request->nama_skor,
            'skor'=>$request->skor
        ]);
        return redirect(route('admin.skor.index'))->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RefSkor  $refSkor
     * @return \Illuminate\Http\Response
     */
    public function show(RefSkor $refSkor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RefSkor  $refSkor
     * @return \Illuminate\Http\Response
     */
    public function edit(RefSkor $refSkor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RefSkor  $refSkor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefSkor $refSkor)
    {
        $request->validate([
            //'id_skor'=>'required',
            'id_jenis_kriteria' => 'required', 
            'nama_skor' => 'required',
            'skor'=>'required'
        ]);

        RefSkor::where('id_skor', $request->id_skor)
        ->update([
            //'id_skor'=>$request->id_skor,
            'id_jenis_kriteria' => $request->id_jenis_kriteria,
            'nama_skor' => $request->nama_skor,
            'skor'=>$request->skor
        ]);
        return redirect(route('admin.skor.index'))->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RefSkor  $refSkor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_skor)
    {
        RefSkor::destroy($id_skor);
        return redirect(route('admin.skor.index'))->with('success','data berhasil di hapus');
    }
}
