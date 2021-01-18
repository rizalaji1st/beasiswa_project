<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeaPenawaranKriteria extends Model
{
    //
    use SoftDeletes;
    protected $table = 'bea_penawaran_kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $fillable = [
        'id_penawaran',
        'nama_kriteria',
        'bobot'
    ];

    public function tanggungan(){
        return $this->hasOne('App\Status\Tanggungan', 'id_kriteria', 'id_kriteria');
    }

    public function statusrumah(){
        return $this->hasOne('App\Status\StatusRumah', 'id_kriteria', 'id_kriteria');
    }

    public function pekerjaanayah(){
        return $this->hasOne('App\Status\PekerjaanAyah', 'id_kriteria', 'id_kriteria');
    }

    public function pekerjaanibu(){
        return $this->hasOne('App\Status\PekerjaanIbu', 'id_kriteria', 'id_kriteria');
    }

    public function penghasilanayah(){
        return $this->hasOne('App\Status\PenghasilanAyah', 'id_kriteria', 'id_kriteria');
    }

    public function penghasilanibu(){
        return $this->hasOne('App\Status\PenghasilanIbu', 'id_kriteria', 'id_kriteria');
    }

    public function pendidikanayah(){
        return $this->hasOne('App\Status\PendidikanAyah', 'id_kriteria', 'id_kriteria');
    }

    public function pendidikanibu(){
        return $this->hasOne('App\Status\PendidikanIbu', 'id_kriteria', 'id_kriteria');
    }

    public function statusayah(){
        return $this->hasOne('App\Status\StatusAyah', 'id_kriteria', 'id_kriteria');
    }

    public function statusibu(){
        return $this->hasOne('App\Status\StatusIbu', 'id_kriteria', 'id_kriteria');
    }
}
