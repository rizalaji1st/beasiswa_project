<?php

namespace App\References;

use Illuminate\Database\Eloquent\Model;

class RefJenisBeasiswa extends Model
{
    //
    protected $table = 'bea_ref_jenis_beasiswa';
    protected $primaryKey = 'id_jenis_beasiswa';

    public function penawaran()
    {
        return $this->belongsTo('App\Adminuniv', 'id_jenis_beasiswa', 'id_jenis_beasiswa');
    }
}
