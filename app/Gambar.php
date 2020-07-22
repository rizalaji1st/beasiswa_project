<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Gambar extends Model
{
    protected $table = "bea_nominasi_file";
 
    protected $fillable = ['file','keterangan'];
}