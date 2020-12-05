<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FilePendaftar extends Model
{
    //
    use softDeletes;
    protected $table = 'bea_pendaftar_upload';
    protected $primaryKey = 'id_pendaftar_upload';
    protected $fillable = [
        'id_pendaftar',
        'id_jenis_file',
        'id_upload_file',
        'path_file',
        'nama_file',
        'deskripsi',
        'ektensi',
        'size'
    ];

    public function pendaftarUpload()
    {
        $this->belongsTo(Pendaftaran::class, 'id_pendaftar', 'id_pendaftar');
    }
    
}
