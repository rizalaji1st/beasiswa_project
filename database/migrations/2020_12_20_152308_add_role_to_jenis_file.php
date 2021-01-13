<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToJenisFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bea_ref_jenis_file', function (Blueprint $table) {
            $table->string('roles')->nullable(); //penawaran, pendaftar
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bea_ref_jenis_file', function (Blueprint $table) {
            //
            $table->dropColumn('roles');
        });
    }
}
