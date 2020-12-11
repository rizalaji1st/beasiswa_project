<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{

    protected $table = 'bea_pendaftar_penawaran';
    protected $primaryKey = 'id_pendaftar';
    protected $fillable = ['id_pendaftar', 
                            'id_penawaran',
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
                            'jumlah_tanggungan',
                            'semester'                        
                        ];

}
