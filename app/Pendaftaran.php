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
    public function users(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function beastatus(){
        return $this->hasOne('App\Status\BeaStatus', 'id_pendaftar', 'id_pendaftar');
    }

    public function penawaran(){
        return $this->belongsTo(Penawarann::class, 'id_penawaran', 'id_penawaran');
    }
}

