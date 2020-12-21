<?php

namespace App\References;

use Illuminate\Database\Eloquent\Model;

class RefJenisFile extends Model
{
    //
    protected $table = 'bea_ref_jenis_file';
    protected $primaryKey = 'id_jenis_file';
    protected $fillable = [
                            'id_jenis_file',
                            'nama_jenis_file',
                            'roles'
                        ];

    public function refJenisFile()
    {
        return $this->hasMany('App\UploadFile', 'id_jenis_file', 'id_jenis_file');
    }
}
