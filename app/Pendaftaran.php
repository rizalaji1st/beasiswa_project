<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\FilePendaftar;

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
                            'is_finalisasi',
                            'create_at',
                            'create_by',
                            'finalized_at',
                            'finalized_by',
                            'printed_at',
                            'is_nominates',
                            'nominated_at',
                            'nominated_by',
                            'is_accepted',
                            'accepted_at',
                            'accepted_by',
                            'is_verified',
                            'verified_at',
                            'verified_by',
                            'verified_note'
                        ];
                        
    public function pendaftaranUpload(){
        return $this->hasMany(filePendaftar::class, 'id_pendaftar', 'id_pendaftar');
    }
    public function pendaftarPenawaran(){
        return $this->belongsTo(Penawaran::class);
    }
    public function userPendaftar(){
        return $this->belongsTo(User::class,'id_user');
    }
}
