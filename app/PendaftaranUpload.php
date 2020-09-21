<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendaftaranUpload extends Model
{
    //
    use softDeletes;
    protected $table = 'bea_ref_jenis_file';
    protected $primaryKey = 'id_penawaran_upload';
    protected $fillable = [
        'id_penawaran_upload', 'id_jenis_file', 'id_penawaran', 'nama_upload'
    ];

    public function penawaranUpload()
    {
        $this->belongsTo(Adminuniv::class, 'id_penawaran', 'id_penawaran');
    }
}
