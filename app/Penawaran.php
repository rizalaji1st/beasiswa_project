<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    
    protected $table = 'bea_penawaran';
    protected $primaryKey = 'id_penawaran';
    protected $fillable = ['nama_penawaran'
    ];

}
