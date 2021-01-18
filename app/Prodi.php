<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'bea_ref_prodi';
    protected $primaryKey = 'kode_prodi';
    protected $fillable = 'nama_prodi';

    // public function refFakultas(){
    //     return $this->belongsTo('App\References\RefFakultas', 'id_fakultas', 'id_fakultas');
    // }

    public function beaMahasiswa(){
        return $this->hasMany(Mahasiswa::class, 'id_prodi', 'id_prodi');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'kode_prodi', 'kode_prodi');
    }

    // public function fakultas(){
    //     return $this->belongsTo(Fakultas::class, 'id_fakultas', 'id_fakultas');
    // }

    // public function Fakultas(){
    //     return $this->belongsTo('App\References\RefFakultas', 'id_fakultas', 'id_fakultas');
    // }
}
