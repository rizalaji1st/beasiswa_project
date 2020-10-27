<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

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
}
