<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use App\PenawaranUpload;
use App\Penawaran;
use App\Http\Requests\PenawaranRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;



class PendaftaranController extends Controller
{

    public function index()
    {
        $beasiswas = Penawaran::all();
        return view('pages.pendaftaran.home', ['beasiswas' => $beasiswas]);
    }

    public function article()
    {
        return $this->belongsTo('App\Penawaran');
    }

    // public function article(){
    //     return $this->belongsTo('App\penawaran');
    // }

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
        return view('pages.pendaftaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    public function detail(Penawaran $penawaran)
    {
        return view('pages.pendaftaran.detail', compact('penawaran'));
    }

    public function daftar(Penawaran $penawaran)
    {
        return view('pages.pendaftaran.daftar', compact('penawaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'files.*' => 'required|file|max:2000',
            'id_penawaran' => 'required',
            'id_pendaftar' => 'required',
            'nim' => 'required',
            'ips' => 'required|min:1|max:4',
            'ipk' => 'required|min:1|max:4',
            'semester' => 'required',
            'penghasilan' => 'required',
        ]);

        // $files = [];
        // foreach ($request->file('files') as $file) {
        //     if ($file->isValid()) {
        //         $path = $file->store('public/files');

        //         // save information to variable
        //         // next will be saved to database
        //         $files[] = [
        //             'id_jenis_file' => $request->id_jenis_file,
        //             'nama_file' => $file->getClientOriginalName(),
        //             // 'filename' => $request->nim,
        //             'created_at' => $now = Carbon::now()->format('Y-m-d H:i:s'),
        //             'updated_at' => $now,
        //         ];
        //     }
        // }

        // bea_ref_jenis_file::insert($files);

        Pendaftaran::create($request->all());
        return redirect('/');
    }
}
