<?php


namespace App\references;

use Illuminate\Database\Eloquent\Model;

class RefSkor extends Model
{
    protected $table = 'bea_skor';
    protected $primaryKey = 'id_skor';
    protected $fillable = [ 'id_jenis_kriteria' ,'nama_skor', 'skor'];

    public function RefKriteria(){
        return $this->belongsTo('App\References\RefKriteria', 'id_jenis_kriteria', 'id_jenis_kriteria');
    }
}
