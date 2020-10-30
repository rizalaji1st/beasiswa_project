<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
  protected $table = 'bea_pendaftar_penawaran';
  protected $primaryKey = 'id_pendaftar';
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
}
