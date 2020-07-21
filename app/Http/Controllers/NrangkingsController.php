<?php

namespace App\Http\Controllers;

use App\{Nrangking,Adminuniv,Pendaftaran};
use Illuminate\Http\Request;

class NrangkingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index()
    // {
    //     $nrangkings = Nrangking::all();
    //     return view('pages.admin.univ.dashboard_nrangking', ['nrangkings'=>$nrangkings]);

        public function index(){
        $adminuniv = Adminuniv::orderBy('ips', 'desc')->paginate(8);
         return view('pages.admin.univ.dashboard_nrangking',['dashboard_nrangking' => $adminuniv]);
   }
         //  $artikel = Adminuniv::all();
         // return view('adminuniv',['adminuniv' => $adminuniv]);
    //}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nrangkings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //INSERT = STORE
    public function store(Request $request)
    {

        $request->validate([
            'nim' => 'required|size:8',
            'nama' => 'required',
        ]);

        Nrangking::create($request->all());
        return redirect('/nrangkings')->with('status', 'Data Nominasi Rangking Berhasil Ditambahkan');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nrangking  $nrangking
     * @return \Illuminate\Http\Response
     */
    public function show($nrangking)
    {
        $nrangking = Pendaftaran::where('id_penawaran', $nrangking)->get();
        return view('pages.admin.univ.show_nrangking')->with('nrank', $nrangking);

        //  return view('pages.admin.univ.show', compact('adminuniv'));
        // return redirect('/adminuniversitas')->with('success', 'Data Penawaran Beasiswa Berhasil Ditambahkan');

        //return view('nrangkings.show', compact('nrangking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nrangking  $nrangking
     * @return \Illuminate\Http\Response
     */
    public function edit(Nrangking $nrangking)
    {
        return view('nrangkings.edit', compact('nrangking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nrangking  $nrangking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nrangking $nrangking)
    {
        $request->validate([
            'nim' => 'required|size:8',
            'nama' => 'required',
        ]);

        Nrangking::where('id', $nrangking->id)
            ->update([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'prodi' => $request->prodi,
                'fakultas' => $request->fakultas,
                'ips' => $request->ips
                ]);
        return redirect('/nrangkings')->with('status', 'Data Nominasi Rangking Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nrangking  $nrangking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nrangking $nrangking)
    {
        Nrangking::destroy($nrangking->id);
        return redirect('/nrangkings')->with('status', 'Data Nomiasi Rangking Berhasil Dihapus');
    }
}
