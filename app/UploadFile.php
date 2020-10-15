<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    //
    protected $table = "bea_upload_file";
    protected $primaryKey = "id_upload_file";

    protected $fillable = [
        'id_penawaran',
        'id_jenis_file'
    ];

    public function uploadFile() {
        $this->belongsTo(Adminuniv::class, 'id_penawaran', 'id_penawaran');
    }


}
