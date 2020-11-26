<?php

namespace App\Kriteria;

use Illuminate\Database\Eloquent\Model;

class StatusAyahIbu extends Model
{

    protected $table = 'bea_status_ayah_ibu';
    protected $primaryKey = 'id_status_AyahIbu';
    protected $fillable = [ 'status', 
                            'skor'
                        ];
}