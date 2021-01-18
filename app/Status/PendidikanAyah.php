<?php

namespace App\Status;

use Illuminate\Database\Eloquent\Model;

class PendidikanAyah extends Model
{
    protected $table = 'pendidikan_ayah';
    protected $fillable = ['id_pendidikan_ayah',
                            'id_kriteria',
                            'status',
                            'skor'];

    public function beastatus(){
        return $this->hasOne('App\Status\BeaStatus', 'id_pendidikan_ayah', 'id_pendidikan_ayah');
    }

    public function beapenawarankriteria(){
        return $this->belongsTo(BeaPenawaranKriteria::class, 'id_kriteria', 'id_kriteria');
    }

}