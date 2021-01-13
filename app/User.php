<?php

namespace App;
use App\Pendaftaran;
use App\References\RefProdi;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roless()
    {
        return $this->belongsToMany('App\Role');
    }

    public function hasAnyRoles($roless){
        if($this->roless()->whereIn('name',$roless)->first()){
            return true;
        }
        return false;

    }
    public function hasRole($role){
        if($this->roless()->where('name',$role)->first()){
            return true;
        }
        return false;
        
    }
    
    public function userProdi(){
        return $this->belongsTo(RefProdi::class, 'kode_prodi','kode_prodi');
      }
    public function userPendaftaran(){
        return $this->hasMany(Pendaftaran::class, 'id_user','id');
      }
}
