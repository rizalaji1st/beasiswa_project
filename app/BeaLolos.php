<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeaLolos extends Model
{
    //
    use SoftDeletes;
    protected $table = 'bea_lolos';
    protected $primaryKey = 'id_pendaftar';
    protected $fillable = [
        'nim',
        'nama',
        'nama_prodi',
        'nama_fakultas',
        'total'
    ];

    // public function PendaftarPenawaran(){
    //     return $this->belongsTo(PendaftarPenawaran::class, 'id_penawaran', 'id_penawaran');
    // }
}
