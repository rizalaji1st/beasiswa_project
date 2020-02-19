<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeaPenawaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bea_penawaran', function (Blueprint $table) {
            $table->bigIncrements('id_penawaran');
            $table->date('tgl_awal_penawaran');
            $table->date('tgl_akhir_penawaran');
            $table->date('tgl_awal_pendaftaran');
            $table->date('tgl_akhir_pendaftaran');
            $table->string('nama_penawaran');
            $table->integer('id_jenis_beasiswa');
            $table->dateTime('tahun');
            $table->dateTime('tgl_awal_verifikasi');
            $table->dateTime('tgl_akhir_verifikasi');
            $table->dateTime('tgl_awal_penetapan');
            $table->dateTime('tgl_akhir_penetapan');
            $table->dateTime('tgl_pengumuman');
            $table->integer('jml_kuota');
            $table->float('ips');
            $table->float('ipk');
            $table->integer('max_penghasilan');
            $table->integer('min_semester');
            $table->integer('max_semester');
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
        Schema::dropIfExists('bea_penawaran');
    }
}
