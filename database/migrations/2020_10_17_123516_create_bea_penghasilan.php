<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeaPenghasilan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('bea_penghasilan', function (Blueprint $table) {
            $table->bigIncrements('id_penghasilan');
            $table->String('penghasilan_min');
            $table->String('penghasilan_max');
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
        Schema::dropIfExists('bea_penghasilan');
    }
}
