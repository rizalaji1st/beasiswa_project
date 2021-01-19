<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationToStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bea_penawaran_kriteria', function (Blueprint $table) {
            $table->unsignedBigInteger('id_status');
            $table->foreign('id_status')->references('id_status')->on('bea_status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bea_penawaran_kriteria', function (Blueprint $table) {
            //
        });
    }
}
