<?php

namespace App\Status;

use Illuminate\Database\Eloquent\Model;

class PekerjaanAyah extends Model
{
    protected $table = 'pekerjaan_ayah';
    protected $fillable = ['id_pekerjaan_ayah',
                            'id_kriteria',
                            'status',
                            'skor'];

    public function beastatus(){
        return $this->hasOne('App\Status\BeaStatus', 'id_pekerjaan_ayah', 'id_pekerjaan_ayah');
    }

    public function beapenawarankriteria(){
        return $this->belongsTo(BeaPenawaranKriteria::class, 'id_kriteria', 'id_kriteria');
    }

}