<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    protected $table = 'id_status';
    protected $primaryKey = 'id_status';
    protected $fillable = ['id_pendaftar', 
                            'id_status_rumah',
                            'id_tanggungan',
                            'id_pekerjaan_Ayah',
                            'id_pendidikan_Ayah',
                            'id_penghasilan_Ayah',
                            'id_statusAyah',
                            'id_pekerjaan_Ibu',
                            'id_penghasilan_Ibu',
                            'id_statusIbu',
                            'id_pendidikan_Ibu'
                        ];

    public function refFakultas(){
        return $this->hasManyThrough('App\References\RefFakultas','App\PenawaranKuotaFakultas', 'id_penawaran','id_fakultas','id_penawaran','id_fakultas');
    }

    public function PendaftarPenawaran(){
        return $this->belongsTo(PendaftarPenawaran::class, 'id_pendaftar', 'id_pendaftar');
    }

    
}