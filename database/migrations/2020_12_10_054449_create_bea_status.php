<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeaStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bea_status', function (Blueprint $table) {
            $table->bigIncrements('id_status');
            $table->unsignedBigInteger('id_pendaftar');
            $table->foreign('id_pendaftar')->references('id_pendaftar')->on('bea_pendaftar_penawaran')->onDelete('cascade');
            $table->unsignedBigInteger('id_tanggungan');
            $table->foreign('id_tanggungan')->references('id_tanggungan')->on('bea_tanggungan')->onDelete('cascade');
            $table->unsignedBigInteger('id_status_rumah');
            $table->foreign('id_status_rumah')->references('id_status_rumah')->on('bea_status_rumah')->onDelete('cascade');
            $table->unsignedBigInteger('id_status_ayah');
            $table->foreign('id_status_ayah')->references('id_status_ayah')->on('status_ayah')->onDelete('cascade');
            $table->unsignedBigInteger('id_status_ibu');
            $table->foreign('id_status_ibu')->references('id_status_ibu')->on('status_ibu')->onDelete('cascade');
            $table->unsignedBigInteger('id_pendidikan_ayah');
            $table->foreign('id_pendidikan_ayah')->references('id_pendidikan_ayah')->on('pendidikan_ayah')->onDelete('cascade');
            $table->unsignedBigInteger('id_pendidikan_ibu');
            $table->foreign('id_pendidikan_ibu')->references('id_pendidikan_ibu')->on('pendidikan_ibu')->onDelete('cascade');
            $table->unsignedBigInteger('id_penghasilan_ayah');
            $table->foreign('id_penghasilan_ayah')->references('id_penghasilan_ayah')->on('penghasilan_ayah')->onDelete('cascade');
            $table->unsignedBigInteger('id_penghasilan_ibu');
            $table->foreign('id_penghasilan_ibu')->references('id_penghasilan_ibu')->on('penghasilan_ibu')->onDelete('cascade');
            $table->unsignedBigInteger('id_pekerjaan_ayah');
            $table->foreign('id_pekerjaan_ayah')->references('id_pekerjaan_ayah')->on('pekerjaan_ayah')->onDelete('cascade');
            $table->unsignedBigInteger('id_pekerjaan_ibu');
            $table->foreign('id_pekerjaan_ibu')->references('id_pekerjaan_ibu')->on('pekerjaan_ibu')->onDelete('cascade');
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
        Schema::dropIfExists('bea_status');
    }
}
