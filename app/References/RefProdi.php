<?php

namespace App\References;

use App\Pendaftaran;
use App\User;
use Illuminate\Database\Eloquent\Model;

class RefProdi extends Model
{
    //
    public $incrementing = false; //disable auto incrementing id

    protected $table = 'bea_ref_prodi';
    protected $primaryKey = 'kode_prodi';
    protected $fillable = ['nama_prodi','id_fakultas'];

    public function refFakultas(){
        return $this->belongsTo('App\References\RefFakultas', 'id_fakultas', 'id_fakultas');
    }

    public function beaMahasiswa(){
        return $this->hasMany(Mahasiswa::class, 'kode_prodi', 'kode_prodi');
    }
    public function prodiMahasiswa(){
        return $this->hasMany(User::class, 'kode_prodi', 'kode_prodi');
    }

    public function userPendaftarPenawaran(){
        return $this->hasManyThrough(
            Pendaftaran::class, 
            User::class,
            'kode_prodi',
            'id_user',
            'kode_prodi',
            'id'
        );
    }
}
