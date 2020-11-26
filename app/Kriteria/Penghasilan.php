<?php

namespace App\Kriteria;

use Illuminate\Database\Eloquent\Model;

class Penghasilan extends Model
{

    protected $table = 'bea_penghasilan';
    protected $primaryKey = 'id_penghasilan';
    protected $fillable = [ 'penghasilan_min',
                            'penghasilan_max', 
                            'skor'
                        ];
}