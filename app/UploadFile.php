<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UploadFile extends Model
{
    //
    use SoftDeletes;
    protected $table = "bea_upload_file";
    protected $primaryKey = "id_upload_file";

    protected $fillable = [
        'id_penawaran',
        'id_jenis_file'
    ];

    public function uploadFile()
    {
        return $this->belongsTo(Adminuniv::class, 'id_penawaran', 'id_penawaran')->using('App\References\RefJenisFile');
    }

    public function refJenisFile()
    {
        return $this->belongsTo('App\References\RefJenisFile', 'id_jenis_file', 'id_jenis_file');
    }
}
