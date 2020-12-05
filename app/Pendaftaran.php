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
                            'semester', 
                            'status_ayah',
                            'status_ibu',
                            'status_rumah',
                            'pendidikan_ayah',
                            'pendidikan_ibu',
                            'pekerjaan_ayah',
                            'pekerjaan_ibu',
                            'jumlah_tanggungan',
                            'gaji_ayah',
                            'gaji_ibu',
                            'id_user',
                            'is_finalisasi',
                            'create_at',
                            'create_by',
                            'finalized_at',
                            'finalized_by',
                            'printed_at',
                            'is_nominates',
                            'nominated_ad',
                            'nominated_by',
                            'is_accepted',
                            'accepted_ad',
                            'accepted_by',
                            'deleted_at',
                            'created_at',
                            'updated_at'

                        ];
                        
    public function pendaftaranUpload(){
        return $this->hasMany(filePendaftar::class, 'id_pendaftar', 'id_pendaftar');
    }
}
