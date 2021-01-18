<?php

namespace App\Status;

use Illuminate\Database\Eloquent\Model;

class PendidikanIbu extends Model
{
    protected $table = 'pendidikan_ibu';
    protected $fillable = ['id_pendidikan_ibu',
                            'id_kriteria',
                            'status',
                            'skor'];

    public function beastatus(){
        return $this->hasOne('App\Status\BeaStatus', 'id_pendidikan_ibu', 'id_pendidikan_ibu');
    }

    public function beapenawarankriteria(){
        return $this->belongsTo(BeaPenawaranKriteria::class, 'id_kriteria', 'id_kriteria');
    }

}