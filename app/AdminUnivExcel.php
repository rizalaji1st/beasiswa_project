<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class AdminUnivExcel extends Model
{
    protected $table = "bea_pendaftar_penawaran";
 
    protected $fillable = ['id_pendaftar','id_penawaran','nim', 'ips', 'ipk', 'penghasilan', 'semester'];
}