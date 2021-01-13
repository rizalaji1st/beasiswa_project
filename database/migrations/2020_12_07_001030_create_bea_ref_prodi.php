<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeaRefProdi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bea_ref_prodi', function (Blueprint $table) {
            $table->String('kode_prodi')->unique();
            $table->primary('kode_prodi');
            $table->String('nama_prodi');
            $table->bigInteger('id_fakultas');
            $table->foreign('id_fakultas')->references('id_fakultas')->on('bea_ref_fakultas')->onDelete('cascade');
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
        Schema::dropIfExists('bea_ref_prodi');
    }
}
