<?php

namespace App\Http\Controllers\Admin\Adminuniversitas;

use App\Http\Controllers\Controller;
use App\References\RefKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refKriteria = RefKriteria::all();
        //return $kriteria;
        return view('pages.admin.universitas.kriteria.tambah_kriteria', ['refKriteria'=>$refKriteria]);

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
        RefKriteria::create([
            'id_jenis_kriteria'=>$request->id_jenis_kriteria, 
            'nama_kriteria'=>$request->nama_kriteria
        ]);
        return redirect(route('admin.kriteria.index'))->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RefKriteria  $refKriteria
     * @return \Illuminate\Http\Response
     */
    public function show(RefKriteria $refKriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RefKriteria  $refKriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(RefKriteria $refKriteria)
    {
        return view('pages.admin.universitas.kriteria.edit', compact('refKriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RefKriteria  $refKriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefKriteria $refKriteria)
    {
        $request->validate([
            'id_jenis_kriteria' => 'required', 
            'nama_kriteria' => 'required',
        ]);

        RefKriteria::where('id_jenis_kriteria', $refKriteria->id_jenis_kriteria)
        ->update([
            'id_jenis_kriteria' => $request->id_jenis_kriteria,
            'nama_kriteria' => $request->nama_kriteria
        ]);
        return redirect(route('admin.kriteria.index'))->with('success', 'Data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RefKriteria  $refKriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jenis_kriteria)
    {
        RefKriteria::destroy($id_jenis_kriteria);
        return redirect(route('admin.kriteria.index'))->with('success','data berhasil di hapus');
    }

}
