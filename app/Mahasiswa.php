<?php

namespace App;
namespace App\References;

use Carbon\Traits\Timestamp;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
	use SoftDeletes;
    //
    protected $table = 'bea_mahasiswa';
    protected $primaryKey = 'nim';
    protected $fillable = ['nama', 
							'alamat', 
							'kabupaten', 
							'[provinsi', 
							'id_prodi', 
							'penghasilan', 
							'nama_ayah', 
							'status_ayah',
							'pend_ayah',
							'pekerjaan_ayah',
							'gaji_ayah',
							'nama_ibu',
							'status_ibu',
							'pend_ibu',
							'pekerjaan_ibu',
							'gaji_ibu',
							'jml_tanggungan',
							'status_rumah'
    					];


    public function pendaftarPenawaran(){
        return $this->hasOne(PendaftarPenawaran::class, 'nim', 'nim');
    }
    public function refProdi(){
        return $this->belongsTo('App\References\RefProdi', 'id_prodi', 'id_prodi');
	}
	
}
