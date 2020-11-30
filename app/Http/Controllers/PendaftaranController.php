<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use App\FilePendaftar;
use App\UploadFile;
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
        // return dd($penawaran);
    }

    public function daftar(Penawaran $penawaran)
    {
        return view('pages.pendaftaran.daftar', compact('penawaran'));
    }

    public function store(Request $request)
    {
        if ($lamp != null) {

                    //upload file
                    $extension = $request->file($upload)->extension();
                    $size = $request->file($upload)->getSize();
                    $filenameWithExt = $request->file($upload)->getClientOriginalName();
                    $filename =  pathinfo($filenameWithExt, PATHINFO_FILENAME) . '_' . date('dmyHis') . '.' . $extension;
                    $this->validate($request, [$upload => 'required|file|max:5000']);
                    $path = Storage::putFileAs('public/data_file/penawaran_upload', $request->file($upload), $filename);
                    $penawaranCreate->penawaranUpload()->create([
                        'id_jenis_file' => $request->$lamp,
                        'id_penawaran' => $penawaranCreate->id_penawaran,
                        'deskripsi' => $request->$deskripsi,
                        'path_file' => $path,
                        'nama_file' => $filename,
                        'ekstensi' => $extension,
                        'size' => $size,
                        'nama_upload' => $request->$nama,
                    ]);
                }
        }
   }

