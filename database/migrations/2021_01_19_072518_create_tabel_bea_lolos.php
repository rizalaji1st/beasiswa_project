<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelBeaLolos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bea_lolos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_penawaran');
            $table->foreign('id_penawaran')->references('id_penawaran')->on('bea_penawaran_kriteria')->onDelete('cascade');
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
        Schema::table('bea_lolos', function (Blueprint $table) {
            $table->dropIfExists('bea_lolos');
        });
    }
}
