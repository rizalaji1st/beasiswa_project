<?php

namespace App\Status;

use Illuminate\Database\Eloquent\Model;

class PenghasilanIbu extends Model
{
    protected $table = 'penghasilan_ibu';
    protected $fillable = ['id_penghasilan_ibu',
                            'id_kriteria',
                            'status',
                            'skor'];

    public function beastatus(){
        return $this->hasOne('App\Status\BeaStatus', 'id_penghasilan_ibu', 'id_penghasilan_ibu');
    }

    public function beapenawarankriteria(){
        return $this->belongsTo(BeaPenawaranKriteria::class, 'id_kriteria', 'id_kriteria');
    }

}