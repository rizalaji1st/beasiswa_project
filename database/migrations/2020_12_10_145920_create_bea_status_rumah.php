<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeaStatusRumah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bea_status_rumah', function (Blueprint $table) {
            $table->bigIncrements('id_status_rumah');
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
        Schema::dropIfExists('bea_status_rumah');
    }
}
