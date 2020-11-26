<?php

namespace App\Kriteria;

use Illuminate\Database\Eloquent\Model;

class PekerjaanAyahIbu extends Model
{

    protected $table = 'bea_pekerjaan_ayah_ibu';
    protected $primaryKey = 'id_pekerjaan_AyahIbu';
    protected $fillable = [ 'status', 
                            'skor'
                        ];
}