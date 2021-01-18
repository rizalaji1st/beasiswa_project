<?php

namespace App\Status;

use Illuminate\Database\Eloquent\Model;

class StatusAyah extends Model
{
    protected $table = 'status_ayah';
    protected $fillable = ['id_status_ayah',
                            'id_kriteria',
                            'status',
                            'skor'];

    public function beastatus(){
        return $this->hasOne('App\Status\BeaStatus', 'id_status_ayah', 'id_status_ayah');
    }

    public function beapenawarankriteria(){
        return $this->belongsTo(BeaPenawaranKriteria::class, 'id_kriteria', 'id_kriteria');
    }

}