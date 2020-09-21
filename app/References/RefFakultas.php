<?php

namespace App\References;

use Illuminate\Database\Eloquent\Model;

class RefFakultas extends Model
{
    //
    protected $table = 'bea_ref_fakultas';
    protected $primaryKey = 'id_fakultas';

    public function penawaranKuotaFakultas() {
        return $this->hasMany('App\PenawaranKuotaFakultas', 'id_fakultas', 'id_fakultas');
    }

}
