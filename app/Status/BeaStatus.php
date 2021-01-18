<?php

namespace App\Status;

use Illuminate\Database\Eloquent\Model;

class BeaStatus extends Model
{
    protected $table = 'bea_status';
    protected $fillable = ['id_status', 
                            'id_pendaftar',
                            'id_tanggungan',
                            'id_status_rumah',
                            'id_status_ayah',
                            'id_status_ibu',
                            'id_pendidikan_ayah',
                            'id_pendidikan_ibu',
                            'id_penghasilan_ayah',
                            'id_penghasilan_ibu',
                            'id_pekerjaan_ayah',
                            'id_pekerjaan_ibu'
                        ];

    public function pendaftaran(){
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftar', 'id_pendaftar');
    }

    public function tanggungan(){
        return $this->belongsTo('App\Status\Tanggungan', 'id_tanggungan', 'id_tanggungan');
    }

    public function statusrumah(){
        return $this->belongsTo('App\Status\StatusRumah', 'id_status_rumah');
    }

    public function statusayah(){
        return $this->belongsTo('App\Status\StatusAyah', 'id_status_ayah');
    }

    public function statusibu(){
        return $this->belongsTo('App\Status\StatusIbu', 'id_status_ibu');
    }

    public function pendidikanayah(){
        return $this->belongsTo('App\Status\PendidikanAyah', 'id_pendidikan_ayah');
    }

    public function pendidikanibu(){
        return $this->belongsTo('App\Status\PendidikanIbu', 'id_pendidikan_ibu');
    }

    public function penghasilanayah(){
        return $this->belongsTo('App\Status\PenghasilanAyah', 'id_penghasilan_ayah');
    }

    public function penghasilanibu(){
        return $this->belongsTo('App\Status\PenghasilanIbu', 'id_penghasilan_ibu');
    }

    public function pekerjaanayah(){
        return $this->belongsTo('App\Status\PekerjaanAyah', 'id_pekerjaan_ayah');
    }

    public function pekerjaanibu(){
        return $this->belongsTo('App\Status\PekerjaanIbu', 'id_pekerjaan_ibu');
    }
}
