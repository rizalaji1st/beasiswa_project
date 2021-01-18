<?php

namespace App\Status;

use Illuminate\Database\Eloquent\Model;

class Tanggungan extends Model
{
    protected $table = 'bea_tanggungan';
    protected $fillable = ['id_tanggungan',
                            'tanggungan',
                            'skor'
        ];

    public function beastatus(){
        return $this->hasOne('App\Status\BeaStatus', 'id_tanggungan', 'id_tanggungan');
    }

    public function beapenawarankriteria(){
        return $this->belongsTo(BeaPenawaranKriteria::class, 'id_kriteria', 'id_kriteria');
    }
}