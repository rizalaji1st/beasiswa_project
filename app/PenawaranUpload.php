<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PenawaranUpload extends Model
{
    //
    use softDeletes;
    protected $table = 'bea_penawaran_upload';
    protected $primaryKey = 'id_penawaran_upload';
    protected $fillable = [
        'id_penawaran_upload','id_jenis_file','id_penawaran', 'nama_upload'
    ];

    public function penawaranUpload() {
        return $this->belongsTo(Adminuniv::class, 'penawaran_id', 'penawaran_id');
    }
}
