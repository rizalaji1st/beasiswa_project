<?php

namespace App;

use App\References\RefFakultas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PenawaranKuotaFakultas extends Model
{
    //
    use softDeletes;
    protected $table = 'bea_penawaran_kuota_fakultas';
    protected $primaryKey = 'id_penawaran_kuota_fakultas';
    protected $fillable = [
        'id_penawaran_kuota_fakultas',
        'id_penawaran',
        'id_fakultas',
        'jml_kuota'
    ];
    protected $guarded = [];

    public function kuotaFakultas() {
        return $this->belongsToMany(Adminuniv::class, 'id_penawaran', 'id_penawaran');
    }

    public function refFakultas() {
        return $this->belongsTo('App\References\RefFakultas', 'id_fakultas', 'id_fakultas');
    }

}
