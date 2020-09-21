<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeaMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bea_mahasiswa', function (Blueprint $table) {
            $table->bigIncrements('id_mahasiswa');
            $table->string('nim');
            $table->string('nama');
            $table->string('alamat');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('kode_prodi');
            $table->integer('penghasilan');
            $table->string('nama_ayah');
            $table->string('status_ayah');
            $table->string('pend_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('gaji_ayah');
            $table->string('nama_ibu');
            $table->string('status_ibu');
            $table->string('pend_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('gaji_ibu');
            $table->integer('jml_tanggungan');
            $table->string('status_rumah');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bea_mahasiswa');
    }
}
