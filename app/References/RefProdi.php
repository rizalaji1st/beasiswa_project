<?php

namespace App\References;

use App\Pendaftaran;
use App\User;
use Illuminate\Database\Eloquent\Model;

class RefProdi extends Model
{
    //
    public $incrementing = false; //disable auto incrementing id

    protected $table = 'bea_ref_prodi';
    protected $primaryKey = 'kode_prodi';
    protected $fillable = ['id_fakultas', 'nama_prodi'];

    public function RefFakultas(){
        return $this->belongsTo('App\References\RefFakultas', 'id_fakultas');
    }

    public function user(){
        return $this->hasMany(User::class);
    }

    // public function refFakultas()
    // {
    //     return $this->belongsTo('App\References\RefFakultas', 'id_fakultas', 'id_fakultas');
    // }
}
