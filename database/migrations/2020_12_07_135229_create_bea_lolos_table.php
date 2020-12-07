<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeaLolosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bea_lolos', function (Blueprint $table) {
            $table->bigIncrements('id_pendaftar');
            $table->string('nim');
            $table->string('nama');
            $table->string('nama_prodi');
            $table->string('nama_fakultas');
            $table->string('total');
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
        Schema::dropIfExists('bea_lolos');
    }
}
