<?php

namespace App\Http\Controllers;

use App\AdminunivPNominasi;
use Illuminate\Http\Request;

class AdminunivPNominasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       
        $pnominasis = AdminunivPNominasi::all();
        return view('pnominasis.index', compact('pnominasis'));
      

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                 
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
     * @param  \App\Adminunivpenetapan  $adminunivpenetapan
     * @return \Illuminate\Http\Response
     */
    public function show(Adminunivpenetapan $adminunivpenetapan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adminunivpenetapan  $adminunivpenetapan
     * @return \Illuminate\Http\Response
     */
    public function edit(Adminunivpenetapan $adminunivpenetapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Adminunivpenetapan  $adminunivpenetapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adminunivpenetapan $adminunivpenetapan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adminunivpenetapan  $adminunivpenetapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adminunivpenetapan $adminunivpenetapan)
    {
        //
    }
}
