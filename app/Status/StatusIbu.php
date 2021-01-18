<?php

namespace App\Status;

use Illuminate\Database\Eloquent\Model;

class StatusIbu extends Model
{
    protected $table = 'status_ibu';
    protected $fillable = ['id_status_ibu',
                            'id_kriteria',
                            'status',
                            'skor'];

    public function beastatus(){
        return $this->hasOne('App\Status\BeaStatus', 'id_status_ibu', 'id_status_ibu');
    }

    public function beapenawarankriteria(){
        return $this->belongsTo(BeaPenawaranKriteria::class, 'id_kriteria', 'id_kriteria');
    }

}