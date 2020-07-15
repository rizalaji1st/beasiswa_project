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
}
