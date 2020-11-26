<?php

namespace App\References;

use Illuminate\Database\Eloquent\Model;

class RefProdi extends Model
{
    //
    protected $table = 'bea_ref_prodi';
    protected $primaryKey = 'id_prodi';
    protected $fillable = 'nama_prodi';

    public function refFakultas(){
        return $this->belongsTo('App\References\RefFakultas', 'id_fakultas', 'id_fakultas');
    }

    public function beaMahasiswa(){
        return $this->hasMany(Mahasiswa::class, 'id_prodi', 'id_prodi');
    }
}
