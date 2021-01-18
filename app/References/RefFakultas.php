<?php

namespace App\References;

use Illuminate\Database\Eloquent\Model;

class RefFakultas extends Model
{
    //
    protected $table = 'bea_ref_fakultas';
    protected $primaryKey = 'id_fakultas';
    protected $fillable = 'nama_fakultas';

    public function penawaranKuotaFakultas() {
        return $this->hasMany('App\PenawaranKuotaFakultas', 'id_fakultas', 'id_fakultas');
    }

    public function RefProdi()
    {
        return $this->hasMany('App\References\RefProdi', 'id_fakultas', 'id_fakultas');
    }
}
