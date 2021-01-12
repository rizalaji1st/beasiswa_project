<?php

namespace App\Status;

use Illuminate\Database\Eloquent\Model;

class PenghasilanAyah extends Model
{
    protected $table = 'penghasilan_ayah';
    protected $fillable = ['id_penghasilan_ayah',
                            'id_kriteria',
                            'status',
                            'skor'];

    public function beastatus(){
        return $this->hasOne('App\Status\BeaStatus', 'id_penghasilan_ayah', 'id_penghasilan_ayah');
    }

    public function beapenawarankriteria(){
        return $this->belongsTo(BeaPenawaranKriteria::class, 'id_kriteria', 'id_kriteria');
    }

}