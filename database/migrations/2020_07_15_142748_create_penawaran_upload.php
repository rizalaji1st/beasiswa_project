<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenawaranUpload extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::dropIfExists('bea_penawaran_upload');
        Schema::create('bea_penawaran_upload', function (Blueprint $table) {
            $table->bigIncrements('id_penawaran_upload');
            $table->unsignedBigInteger('id_jenis_file');
            $table->foreign('id_jenis_file')->references('id_jenis_file')->on('bea_ref_jenis_file')->onDelete('cascade');
            $table->unsignedBigInteger('id_penawaran');
            $table->foreign('id_penawaran')->references('id_penawaran')->on('bea_penawaran')->onDelete('cascade');
            $table->string('nama_upload');
            $table->string('path_file');
            $table->string('nama_file');
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
        Schema::dropIfExists('bea_penawaran_upload');
    }
}
