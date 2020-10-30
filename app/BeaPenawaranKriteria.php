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
}
