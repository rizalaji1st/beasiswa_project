<?php

namespace App\Http\Controllers\Admin\Adminuniversitas;

use App\Http\Controllers\Controller;
use App\Penawaran;
use App\Pendaftaran;
use App\References\RefProdi;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerifikasiController extends Controller
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
        return view('pages.admin.universitas.verifikasi.index', ['beasiswas' => $beasiswas]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $pendaftars = Pendaftaran::with('userPendaftar')->with('pendaftaranUpload')->where('id_penawaran',$id)->get();
        $beasiswa = Penawaran::findOrFail($id);
        return view('pages.admin.universitas.verifikasi.show', compact('beasiswa','pendaftars'));
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $date_verified = Carbon::now();
        $pendaftar = Pendaftaran::where('id_pendaftar',$request->noPendaftar)
                    ->update(['is_verified' => $request->status_verifikasi,
                            'verified_at'=>$date_verified,
                            'verified_by'=>Auth::user()->name,
                            'verified_note'=>$request->catatan]);
        $pendaftars = Pendaftaran::with('userPendaftar')->with('pendaftaranUpload')->where('id_penawaran',$id)->get();
        $beasiswa = Penawaran::findOrFail($id);
        return view('pages.admin.universitas.verifikasi.show', compact('beasiswa','pendaftars'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
