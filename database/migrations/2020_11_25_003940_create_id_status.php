<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('id_status', function (Blueprint $table) {
            $table->bigIncrements('id_status');
            $table->unsignedBigInteger('id_pendaftar');
            $table->foreign('id_pendaftar')->references('id_pendaftar')->on('bea_pendaftar_penawaran')->onDelete('cascade');
            $table->unsignedBigInteger('id_pekerjaan_AyahIbu');
            $table->foreign('id_pekerjaan_AyahIbu')->references('id_pekerjaan_AyahIbu')->on('bea_pekerjaan_ayah_ibu')->onDelete('cascade');
            $table->unsignedBigInteger('id_pendidikan_AyahIbu');
            $table->foreign('id_pendidikan_AyahIbu')->references('id_pendidikan_AyahIbu')->on('bea_pendidikan_ayah_ibu')->onDelete('cascade');
            $table->unsignedBigInteger('id_penghasilan');
            $table->foreign('id_penghasilan')->references('id_penghasilan')->on('bea_penghasilan')->onDelete('cascade');
            $table->unsignedBigInteger('id_statusAyahIbu');
            $table->foreign('id_statusAyahIbu')->references('id_statusAyahIbu')->on('bea_status_ayah_ibu')->onDelete('cascade');
            $table->unsignedBigInteger('id_status_rumah');
            $table->foreign('id_status_rumah')->references('id_status_rumah')->on('bea_status_rumah')->onDelete('cascade');
            $table->unsignedBigInteger('id_tanggungan');
            $table->foreign('id_tanggungan')->references('id_tanggungan')->on('bea_tanggungan')->onDelete('cascade');
            
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
        Schema::dropIfExists('id_status');
    }
}
