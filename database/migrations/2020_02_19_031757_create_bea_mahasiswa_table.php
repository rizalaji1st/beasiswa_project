<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeaMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bea_mahasiswa', function (Blueprint $table) {
            $table->bigIncrements('id_mahasiswa');
            $table->string('nim');
            $table->string('nama');
            $table->string('alamat');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('kode_prodi');
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
        Schema::dropIfExists('bea_mahasiswa');
    }
}
