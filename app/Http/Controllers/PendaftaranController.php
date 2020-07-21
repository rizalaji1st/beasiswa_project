<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use Illuminate\Http\Request;
use App\Adminuniv;


class PendaftaranController extends Controller
{

    public function index()
    {
        $beasiswas = Adminuniv::all();
        return view('pages.pendaftaran.home', ['beasiswas' => $beasiswas]);
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
