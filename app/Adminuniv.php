<?php

namespace App;

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
}
