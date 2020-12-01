<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeaPendaftarUpload extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bea_pendaftar_upload', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // <- add this
            $table->bigIncrements('id_pendaftar_upload');
            $table->string('id_pendaftar');
            $table->foreign('id_pendaftar')->references('id_pendaftar')->on('bea_pendaftar_penawaran')->onDelete('cascade');
            $table->unsignedBigInteger('id_jenis_file');
            $table->foreign('id_jenis_file')->references('id_jenis_file')->on('bea_ref_jenis_file')->onDelete('cascade');
            $table->unsignedBigInteger('id_upload_file');
            $table->foreign('id_upload_file')->references('id_upload_file')->on('bea_upload_file')->onDelete('cascade');
            $table->string('nama_file');
            $table->string('path_file');
            $table->string('deskripsi');
            $table->string('ektensi');
            $table->integer('size');
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
        Schema::dropIfExists('bea_pendaftar_upload');
    }
}
