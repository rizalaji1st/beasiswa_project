<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use App\PenawaranUpload;
use App\Adminuniv;
use App\Http\Requests\PenawaranRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;



class PendaftaranController extends Controller
{

    public function index()
    {
        $beasiswas = Adminuniv::all();
        return view('pages.pendaftaran.home', ['beasiswas' => $beasiswas]);
    }

    public function article()
    {
        return $this->belongsTo('App\Adminuniv');
    }

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
    public function store(Request $request)
    {
    }

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

    public function detail(Adminuniv $adminuniv)
    {
        return view('pages.pendaftaran.detail', compact('adminuniv'));
    }

    public function daftar(Adminuniv $adminuniv)
    {
        return view('pages.pendaftaran.daftar', compact('adminuniv'));
    }

    public function tambah(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'id_penawaran' => 'required',
            'id_pendaftar' => 'required',
            'nim' => 'required',
            'ips' => 'required|min:1|max:4',
            'ipk' => 'required|min:1|max:4',
            'semester' => 'required',
            'penghasilan' => 'required',
        ]);

        Pendaftaran::create($request->all());
        return redirect('/');
    }
}
