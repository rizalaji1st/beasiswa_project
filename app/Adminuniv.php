<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Adminuniv extends Model
{
    //
    protected $table = 'bea_penawaran';
    protected $primaryKey = 'id_penawaran';
    protected $dates = ['tgl_awal_penawaran',
                        'tgl_akhir_penawaran',
                        'tgl_awal_pendaftaran',
                        'tgl_akhir_pendaftaran',
                        'tgl_awal_penetapan',
                        'tgl_akhir_penetapan',
                        'tgl_pengumuman'];
    // protected $fillable = ['nama_penawaran',
    //                         'jml-kuota',
    //                         'tgl-awal-pendaftaran',
    //                         'tgl-akhir-pendaftaran',
    //                         'tgl-awal-penetapan',
    //                         'tgl-akhir-penetapan',
    //                         'tgl-awal-verifikasi',
    //                         'tgl-akhir-verifikasi',
    //                         'tgl-pengumuman',
    //                         'ips',
    //                         'ipk',
    //                         'min-semester',
    //                         'max-semester',
    //                         'max-penghasilan'
    //                     ];
    protected $guarded = [];
}
