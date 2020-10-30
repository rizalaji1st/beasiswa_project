<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendaftarPenawaran extends Model
{
   protected $table = 'bea_pendaftar_penawaran';
   protected $primaryKey = 'id_pendaftar';
    protected $fillable = ['id_pendaftar', 'nim'];

    public function refFakultas(){
        return $this->hasManyThrough('App\References\RefFakultas','App\PenawaranKuotaFakultas', 'id_penawaran','id_fakultas','id_penawaran','id_fakultas');
    }
     public function mahasiswa() {
        $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }
}