<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikanAyah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan_ayah', function (Blueprint $table) {
            $table->bigIncrements('id_pendidikan_ayah');
            $table->unsignedBigInteger('id_kriteria');
            $table->foreign('id_kriteria')->references('id_kriteria')->on('bea_penawaran_kriteria')->onDelete('cascade');
            $table->string('status');
            $table->integer('skor');
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
        Schema::dropIfExists('pendidikan_ayah');
    }
}
