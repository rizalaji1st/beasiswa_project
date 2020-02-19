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
            $table->integer('id_penawaran');
            $table->integer('id_fakultas');
            $table->integer('jml_kuota');
            $table->softDeletes();
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
