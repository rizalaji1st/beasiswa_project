<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeaPenawaranKuotaFakultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bea_penawaran_kuota_fakultas', function (Blueprint $table) {
            $table->bigIncrements('id_penawaran_kuota_fakultas');
            $table->unsignedBigInteger('id_penawaran');
            $table->foreign('id_penawaran')->references('id_penawaran')->on('bea_penawaran')->onDelete('cascade');
            $table->integer('id_fakultas');
            $table->integer('jml_kuota');
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
        Schema::dropIfExists('bea_penawaran_kuota_fakultas');
    }
}
