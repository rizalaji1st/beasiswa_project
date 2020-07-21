<?php

namespace App;

use Carbon\Traits\Timestamp;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adminuniv extends Model
{

    use SoftDeletes;
    //
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
                        'tahun',
                    ];

    protected $fillable = ['nama_penawaran',
                            'jml_kuota',
                            'tgl_awal_penawaran', 
                            'tgl_akhir_penawaran',
                            'tgl_awal_pendaftaran', 
                            'tgl_akhir_pendaftaran', 
                            'tgl_awal_verifikasi', 
                            'tgl_akhir_verifikasi', 
                            'tgl_awal_penetapan', 
                            'tgl_akhir_penetapan',
                            'tgl_pengumuman', 
                            'ips', 
                            'ipk', 
                            'min_semester', 
                            'max_semester', 
                            'max_penghasilan', 
                            'deskripsi',
                            'tahun'];
    
    public function penawaranUpload(){
        return $this->hasMany(PenawaranUpload::class, 'id_penawaran', 'id_penawaran');
    }
    
    protected $guarded = [];

    public function pendaftaran(){
        return $this->hasMany(Pendaftaran::class);
    }
}

