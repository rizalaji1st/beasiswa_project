<?php

namespace App;

use Carbon\Traits\Timestamp;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Adminuniv extends Model
{
    protected $table = 'bea_penawaran';
    protected $primaryKey = 'id_penawaran';
    protected $dates = ['tgl_awal_penawaran',
                        'tgl_akhir_penawaran',
                        'tgl_awal_pendaftaran',
                        'tgl_akhir_pendaftaran',
                        'tgl_awal_verifikasi',
                        'tgl_akhir_verifikasi',
                        'tgl_awal_penetapan',
                        'tgl_akhir_penetapan',
                        'tgl_pengumuman',
                        'tahun'
                    ];
    protected $guarded = [];

    public function pendaftaran(){
        return $this->hasMany(Pendaftaran::class);
    }
}

