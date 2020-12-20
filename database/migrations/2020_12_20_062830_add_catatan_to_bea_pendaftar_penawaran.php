<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCatatanToBeaPendaftarPenawaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bea_pendaftar_penawaran', function (Blueprint $table) {
            //
            $table->string('verified_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bea_pendaftar_penawaran', function (Blueprint $table) {
            //
            $table->dropColumn('verified_note');
        });
    }
}
