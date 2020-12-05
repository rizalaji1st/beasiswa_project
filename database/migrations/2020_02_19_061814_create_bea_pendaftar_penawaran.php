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
            $table->unsignedBigInteger('id_penawaran');
            $table->foreign('id_penawaran')->references('id_penawaran')->on('bea_penawaran')->onDelete('cascade');
            $table->integer('id_user');
            $table->string('nim');
            $table->float('ips');
            $table->float('ipk');
            $table->integer('penghasilan');
            $table->string('status_ayah'); //hidup, bercerai, wafat
            $table->string('status_ibu'); //hidup, bercerai, wafat
            $table->string('status_rumah'); //sendiri, menumpang, menumpang tanpa izin, sewa tahunan, sewa bulanan, tidak memiliki
            $table->string('pendidikan_ayah'); //Tidak Sekolah, SD/MI / Sederajat, SMP/MTs / Sederajat, SMA/MA / Sederajat, D1 / Sederajat, D2 / Sederajat, D3 / Sederajat, D4/S1 / Sederajat, S2/Sp1 / Sederajat
            $table->string('pendidikan_ibu'); //Tidak Sekolah, SD/MI / Sederajat, SMP/MTs / Sederajat, SMA/MA / Sederajat, D1 / Sederajat, D2 / Sederajat, D3 / Sederajat, D4/S1 / Sederajat, S2/Sp1 / Sederajat
            $table->string('pekerjaan_ayah');//TIDAK BEKERJA, Lainnya, Petani, Wirausaha, Peg. Swasta, PNS, TNI / POLRI
            $table->string('pekerjaan_ibu');//TIDAK BEKERJA, Lainnya, Petani, Wirausaha, Peg. Swasta, PNS, TNI / POLRI
            $table->string('gaji_ayah');
            $table->string('gaji_ibu');
            $table->integer('jumlah_tanggungan');
            $table->integer('semester');
            $table->boolean('is_finalisasi')->default(false);
            $table->string('create_at')->nullable();
            $table->string('create_by')->nullable();
            $table->string('finalized_at')->nullable();
            $table->string('finalized_by')->nullable();
            $table->string('printed_at')->nullable();
            $table->string('is_nominates')->nullable();
            $table->string('nominated_at')->nullable();
            $table->string('nominated_by')->nullable();
            $table->boolean('is_accepted')->nullable();
            $table->string('accepted_at')->nullable();
            $table->string('accepted_by')->nullable();
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
