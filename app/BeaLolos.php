<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class BeaLolos extends Model
{
    //protected $guarded = []; 
    //
    //use SoftDeletes;
    protected $table = 'bea_lolos';
    protected $fillable = [
        'id',
        'id_penawaran',
        'nama_prodi',
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
    ];
}