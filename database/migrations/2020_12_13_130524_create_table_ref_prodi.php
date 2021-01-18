<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBeaRefProdi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bea_ref_prodi', function (Blueprint $table) {
            $table->string('kode_prodi');
            $table->string('id_fakultas');
            $table->string('nama_prodi');
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
<<<<<<< HEAD:database/migrations/2020_10_14_174848_create_bea_status_ayah_ibu.php
        Schema::dropIfExists('bea_status_ayah_ibu');
=======
        Schema::dropIfExists('bea_ref_prodi');
>>>>>>> rangking-penetapan:database/migrations/2020_12_13_130524_create_table_ref_prodi.php
    }
}
