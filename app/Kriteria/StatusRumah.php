<?php

namespace App\Kriteria;

use Illuminate\Database\Eloquent\Model;

class StatusRumah extends Model
{

    protected $table = 'bea_status_rumah';
    protected $primaryKey = 'id_status_rumah';
    protected $fillable = [ 'status', 
                            'skor'
                        ];
}