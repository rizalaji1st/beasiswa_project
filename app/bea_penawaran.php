<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bea_penawaran extends Model
{
    public function bea_pendaftar_penawaran(){
    	return $this->hasMany('App\bea_pendaftar_penawaran');
    }
}