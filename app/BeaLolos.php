<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeaLolos extends Model
{
    //
    use SoftDeletes;
    protected $table = 'bea_lolos';
    protected $primaryKey = 'id_lolos';
    protected $fillable = [
        'id_penawaran',
        'nama_prodi',
        'nama_fakultas',
        'nim',
        'nama',
        'semester',
        'status_ayah',
        'status_ibu',
        'status_rumah',
        'gaji_ayah',
        'gaji_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'pendidikan_ayah',
        'pendidikan_ibu',
        'jumlah_tanggungan'
    ];

    // public function PendaftarPenawaran(){
    //     return $this->belongsTo(PendaftarPenawaran::class, 'id_penawaran', 'id_penawaran');
    // }
}
