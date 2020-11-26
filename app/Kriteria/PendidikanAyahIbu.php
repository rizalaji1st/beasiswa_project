<?php

namespace App\Kriteria;

use Illuminate\Database\Eloquent\Model;

class PendidikanAyahIbu extends Model
{

    protected $table = 'bea_pendidikan_ayah_ibu';
    protected $primaryKey = 'id_pendidikan_AyahIbu';
    protected $fillable = [ 'status', 
                            'skor'
                        ];
}