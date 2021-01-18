<?php

namespace App\Status;

use Illuminate\Database\Eloquent\Model;

class PekerjaanIbu extends Model
{
    protected $table = 'pekerjaan_ibu';
    protected $fillable = ['id_pekerjaan_ibu',
                            'id_kriteria',
                            'status',
                            'skor'];

    public function beastatus(){
        return $this->hasOne('App\Status\BeaStatus', 'id_pekerjaan_ibu', 'id_pekerjaan_ibu');
    }

    public function beapenawarankriteria(){
        return $this->belongsTo(BeaPenawaranKriteria::class, 'id_kriteria', 'id_kriteria');
    }

}