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
        'penghasilan_ayah',
        'penghasilan_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'pendidikan_ayah',
        'pendidikan_ibu',
<<<<<<< HEAD
=======
        'jumlah_tanggungan'
>>>>>>> c055ac4e7041826aa436f939458d3cbabac13897
    ];
}
