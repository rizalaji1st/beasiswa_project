<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{

    protected $table = 'bea_pendaftar_penawaran';
    protected $fillable = ['id_pendaftar', 
                            'id_penawaran',
                            'id_user', 
                            'nim', 
                            'ips', 
                            'ipk', 
                            'penghasilan', 
                            'status_ayah',
                            'status_ibu',
                            'status_rumah',
                            'pendidikan_ayah',
                            'pendidikan_ibu',
                            'pekerjaan_ayah',
                            'pekerjaan_ibu',
                            'gaji_ayah',
                            'gaji_ibu',
                            'jumlah_tanggungan',
                            'semester'];


    public function user()
        {
            return $this->belongsTo(User::class, 'id_user');
        }
    
    // public function RefProdi()
    // {
    //     return $this->belongsTo('App\References\RefProdi', 'kode_prodi');
    // }
    
}

