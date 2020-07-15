<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class bea_pendaftar_penawaran extends Model
{
    public function bea_penawaran(){
    	return $this->belongsTo('App\bea_penawaran');
    }
}