<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeaPendaftarPenawaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bea_pendaftar_penawaran', function (Blueprint $table) {
            $table->bigIncrements('id_pendaftar');
            $table->integer('id_penawaran');
            $table->integer('nim');
            $table->float('ips');
            $table->float('ipk');
            $table->integer('penghasilan');
            $table->integer('semester');
            $table->boolean('is_finalisasi');
            $table->string('create_at');
            $table->string('create_by');
            $table->string('finalized_at');
            $table->string('finalized_by');
            $table->string('printed_at');
            $table->string('is_nominate');
            $table->string('nominated_at');
            $table->string('nominated_by');
            $table->boolean('is_accepted');
            $table->string('accepted_at');
            $table->string('accepted_by');
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
        Schema::dropIfExists('bea_pendaftar_penawaran');
    }
}
