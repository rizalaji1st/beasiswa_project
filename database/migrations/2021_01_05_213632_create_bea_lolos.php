<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeaLolos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bea_lolos', function (Blueprint $table) {
            $table->integer('id');
            $table->unsignedBigInteger('id_kriteria');
            $table->foreign('id_kriteria')->references('id_kriteria')->on('bea_penawaran_kriteria')->onDelete('cascade');
            $table->string('nama_prodi');
            $table->string('nim');
            $table->string('nama');
            $table->integer('semester');
            $table->string('status_ayah');
            $table->string('status_ibu');
            $table->string('status_rumah');
            $table->integer('gaji_ayah');
            $table->integer('gaji_ibu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->string('pendidikan_ayah');
            $table->string('pendidikan_ibu');
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
        Schema::dropIfExists('bea_lolos');
    }
}
