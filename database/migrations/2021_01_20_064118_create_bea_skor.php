<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeaSkor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bea_skor', function (Blueprint $table) {
            $table->bigIncrements('id_skor');
            $table->string('id_jenis_kriteria');
            $table->foreign('id_jenis_kriteria')->references('id_jenis_kriteria')->on('bea_ref_kriteria')->onDelete('cascade');
            $table->string('nama skor');
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
        Schema::dropIfExists('bea_skor');
    }
}
