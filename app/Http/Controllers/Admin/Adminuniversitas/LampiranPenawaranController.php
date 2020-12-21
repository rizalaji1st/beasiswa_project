<?php

namespace App\Http\Controllers\Admin\Adminuniversitas;

use App\Http\Controllers\Controller;
use App\References\RefJenisFile;
use Illuminate\Http\Request;

class LampiranPenawaranController extends Controller
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
        $lampirans = RefJenisFile::all();
        return view('pages.admin.universitas.lampiran.penawaran', ['lampirans'=>$lampirans]);
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
        RefJenisFile::create([
            'nama_jenis_file'=>$request->lampiran,
            'roles'=>$request->roles
        ]);
        return redirect(route('admin.lampiran-penawaran.index'))->with('success','Data berhasil ditambahkan');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\References\RefJenisFile  $refJenisFile
     * @return \Illuminate\Http\Response
     */
    public function show(RefJenisFile $refJenisFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\References\RefJenisFile  $refJenisFile
     * @return \Illuminate\Http\Response
     */
    public function edit(RefJenisFile $refJenisFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\References\RefJenisFile  $refJenisFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefJenisFile $refJenisFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\References\RefJenisFile  $refJenisFile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        RefJenisFile::destroy($id);
        return redirect(route('admin.lampiran-penawaran.index'))->with('success','data berhasil di hapus');
    }
}
