<?php

namespace App\References;

use Illuminate\Database\Eloquent\Model;

class RefProdi extends Model
{
    //
    protected $table = 'bea_ref_prodi';
    protected $primaryKey = 'kode_prodi';
    protected $fillable = 'nama_prodi';

    public function refFakultas(){
        return $this->belongsTo('App\References\RefFakultas', 'id_fakultas', 'id_fakultas');
    }
    

    public function user()
    {
        return $this->hasMany(User::class, 'kode_prodi', 'kode_prodi');
    }
}
