<?php

namespace App\Status;

use Illuminate\Database\Eloquent\Model;

class StatusRumah extends Model
{
    protected $table = 'bea_status_rumah';
    protected $fillable = ['id_status_rumah',
                            'status',
                            'skor'
    ];

    public function beastatus(){
        return $this->hasOne('App\Status\BeaStatus', 'id_status_rumah', 'id_status_rumah');
    }

    public function beapenawarankriteria(){
        return $this->belongsTo(BeaPenawaranKriteria::class, 'id_kriteria', 'id_kriteria');
    }
}

