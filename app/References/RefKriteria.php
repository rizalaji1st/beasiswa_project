<?php

namespace App\references;

use Illuminate\Database\Eloquent\Model;


class RefKriteria extends Model
{
    public $incrementing = false; //disable auto incrementing id
    protected $table = 'bea_ref_kriteria';
    protected $primaryKey = 'id_jenis_kriteria';
    protected $fillable = [ 'id_jenis_kriteria' ,'nama_kriteria'];

    public function RefSkor(){
        return $this->hasMany('App\References\RefSkor', 'id_jenis_kriteria');
    }
}
