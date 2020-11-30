<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('nim')->nullable();
            $table->string('nama')->nullable();
            $table->string('ipk')->nullable();
            $table->string('ips')->nullable();
            $table->string('semester')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_prodi')->nullable();
            $table->integer('penghasilan')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('status_ayah')->nullable();
            $table->string('pend_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('gaji_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('status_ibu')->nullable();
            $table->string('pend_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('gaji_ibu')->nullable();
            $table->integer('jml_tanggungan')->nullable();
            $table->string('status_rumah')->nullable();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nim');
            $table->dropColumn('nama');
            $table->dropColumn('alamat');
            $table->dropColumn('kabupaten');
            $table->dropColumn('provinsi');
            $table->dropColumn('kode_prodi');
            $table->dropColumnr('penghasilan');
            $table->dropColumn('nama_ayah');
            $table->dropColumn('status_ayah');
            $table->dropColumn('pend_ayah');
            $table->dropColumn('pekerjaan_ayah');
            $table->dropColumn('gaji_ayah');
            $table->dropColumn('nama_ibu');
            $table->dropColumn('status_ibu');
            $table->dropColumn('pend_ibu');
            $table->dropColumn('pekerjaan_ibu');
            $table->dropColumn('gaji_ibu');
            $table->dropColumn('jml_tanggungan');
            $table->dropColumn('status_rumah');

        });
    }
}
