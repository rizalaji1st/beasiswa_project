<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenghasilanIbu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penghasilan_ibu', function (Blueprint $table) {
            $table->bigIncrements('id_penghasilan_ibu');
            $table->unsignedBigInteger('id_kriteria');
            $table->foreign('id_kriteria')->references('id_kriteria')->on('bea_penawaran_kriteria')->onDelete('cascade');
            $table->string('penghasilan_min');
            $table->string('penghasilan_max');
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
        Schema::dropIfExists('penghasilan_ibu');
    }
}
