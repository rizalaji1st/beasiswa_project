<?php

namespace App;

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
        $this->belongsTo(Adminuniv::class, 'id_penawaran', 'id_penawaran');
    }

}
