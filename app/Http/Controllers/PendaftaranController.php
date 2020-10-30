<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use App\FilePendaftar;
use App\UploadFile;
use App\PenawaranUpload;
use App\Adminuniv;
use App\Http\Requests\PenawaranRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;



class PendaftaranController extends Controller
{

    public function index()
    {
        $adminuniv = Adminuniv::all();
        // $file = UploadFile::get();
        return view('pages.pendaftaran.home', compact('adminuniv'));
    }

    public function article()
    {
        return $this->belongsTo('App\Adminuniv');
    }

    // public function article(){
    //     return $this->belongsTo('App\Adminuniv');
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

    public function detail(Adminuniv $adminuniv)
    {
        return view('pages.pendaftaran.detail', compact('adminuniv'));
    }

    public function daftar(Adminuniv $adminuniv)
    {
        return view('pages.pendaftaran.daftar', compact('adminuniv'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'files.*' => 'required|file|max:2000',
            'id_penawaran' => 'required',
            'id_pendaftar' => 'required',
            'nim' => 'required',
            'ips' => 'required|min:1|max:4',
            'ipk' => 'required|min:1|max:4',
            'semester' => 'required',
            'penghasilan' => 'required',
        ]);

        Pendaftaran::create($request->all());
        foreach ($request->files as $file) {
            $extension = $request->file($file)->extension();
            $size = $request->file($file)->getSize();
            FilePendaftar::create([
                // 'id_jenis_file' => $request->$lamp,
                // 'id_penawaran' => $penawaranCreate->id_penawaran,
                // 'deskripsi' => $request->$deskripsi,
                // 'path_file' => $path,
                // 'nama_file' => $filename,
                'ekstensi' => $extension,
                'size' => $size,
                //  'nama_upload' => $request->$nama,
            ]);
            return redirect('/');
        }
    }
}
