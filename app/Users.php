<?php

namespace App;

use App\References\RefProdi;
use App\Pendaftaran;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
<<<<<<< HEAD
  protected $table = 'bea_pendaftar_penawaran';
  protected $primaryKey = 'id_user';
  protected $integer = [
    'id_penawaran',
    'nim',
    'penghasilan',
    'semester'
  ];
  protected $double = [
    ('ips, 8, 2'),
    ('ipk, 8, 2')
  ];
  protected $guarded = [];
  protected $fillable = ['prodi', 'fakultas'];

  
  public function userProdi(){
    return $this->belongsTo(RefProdi::class);
  }

  

=======
  // protected $table = 'bea_pendaftar_penawaran';
  // protected $primaryKey = 'id_pendaftar';
  // protected $primaryKey = 'id_user';
  // protected $integer = [
  //   'id_penawaran',
  //   'nim',
  //   'penghasilan',
  //   'semester'
  // ];
  // protected $double = [
  //   ('ips, 8, 2'),
  //   ('ipk, 8, 2')
  // ];
  // protected $guarded = [];
  // protected $fillable = ['prodi', 'fakultas'];
>>>>>>> rangking-penetapan
}
