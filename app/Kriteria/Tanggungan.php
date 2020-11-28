<?php

namespace App\Kriteria;

use Illuminate\Database\Eloquent\Model;

class Tanggungan extends Model
{

    protected $table = 'bea_tanggungan';
    protected $primaryKey = 'id_tanggungan';
    protected $fillable = [ 'tanggungan', 
                            'skor'
                        ];
}