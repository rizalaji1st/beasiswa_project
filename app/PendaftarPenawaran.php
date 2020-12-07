<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendaftarPenawaran extends Model
{
    protected $table = 'bea_pendaftar_penawaran';
    protected $primaryKey = 'id_pendaftar';
    protected $fillable = ['id_pendaftar', 
                            'id_penawaran',
                            'nim',
                            'ips',
                            'ipk',
                            'penghasilan',
                            'status_ayah',
                            'status_ibu',
                            'status_rumah',
                            'pendidikan_ayah',
                            'pendidikan_ibu',
                            'pekerjaan_ayah',
                            'pekerjaan_ibu',
                            'jumlah_tanggungan',
                            'semester'                        
                        ];

    public function refFakultas(){
        return $this->hasManyThrough('App\References\RefFakultas','App\PenawaranKuotaFakultas', 'id_penawaran','id_fakultas','id_penawaran','id_fakultas');
    }
        public function mahasiswa() {
        $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function penawaran(){
        return $this->belongsTo(Penawaran::class, 'id_penawaran', 'id_penawaran');
    }

    public function status(){
        return $this->hasMany('App\Kriteria\Status', 'id_pendaftar', 'id_pendaftar');
    }

    public function beaLolos(){
        return $this->hasMany(BeaLolos::class, 'id_penawaran', 'id_penawaran');
    }
}