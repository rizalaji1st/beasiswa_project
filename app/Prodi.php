<?php

namespace App;


use Carbon\Traits\Timestamp;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prodi extends Model
{
    
  protected $table ='bea_prodi';
  protected $fillable = ['id_prodi', 'nama_prodi'];

  public function prodi(){
  	return $this->hasMany(Mahasiswa::class, 'id_prodi', 'id_prodi');
  }

  public function fakultas(){
  	return $this->belongsTo(Fakultas::class, 'id_fakultas', 'id_fakultas');
  }

  
}
