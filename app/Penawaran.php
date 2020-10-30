<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penawaran extends Model
{

    use SoftDeletes;
    //
    protected $table = 'bea_penawaran';
    protected $primaryKey = 'id_penawaran';
    protected $dates = [
        'tgl_awal_penawaran',
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
                            'id_jenis_beasiswa',
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
                            'tahun',
                            'is_double',
                            'tahun_dasar_akademik',
                            'id_user_pembuat',
        ];
    
    public function penawaranUpload(){
        return $this->hasMany(PenawaranUpload::class, 'id_penawaran', 'id_penawaran');
    }

    protected $guarded = [];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function getKuotaFakultas()
    {
        return $this->hasMany(PenawaranKuotaFakultas::class, 'id_penawaran', 'id_penawaran');
    }

    public function refFakultas()
    {
        return $this->hasManyThrough('App\References\RefFakultas', 'App\PenawaranKuotaFakultas', 'id_penawaran', 'id_fakultas', 'id_penawaran', 'id_fakultas');
    }

    public function refJenisPenawaran()
    {
        return $this->hasOne('App\References\RefJenisBeasiswa', 'id_jenis_beasiswa', 'id_jenis_beasiswa');
    }

    public function lampiranPendaftar()
    {
        return $this->hasMany(UploadFile::class, 'id_penawaran', 'id_penawaran');
    }

    public function uploadFile()
    {
        return $this->hasMany('App\References\RefJenisFile', 'id_jenis_file', 'id_jenis_file');
    }
    public function kriteriaPenilaian()
    {
        return $this->hasMany(BeaPenawaranKriteria::class, 'id_penawaran', 'id_penawaran');
    }
}
