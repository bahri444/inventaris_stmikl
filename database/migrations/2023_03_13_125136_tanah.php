<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_lahan', function (Blueprint $table) {
            $table->id('id_sarana');
            $table->char('jenis_prasarana', 10);
            $table->string('nama_prasarana', 50);
            $table->char('no_sertifikat_tanah', 20);
            $table->char('panjang_tanah', 4);
            $table->char('lebar_tanah', 4);
            $table->char('luas_lahan_tersedia', 4);
            $table->char('kepemilikan', 20);
            $table->string('alamat', 50);
            $table->char('rt', 3);
            $table->char('rw', 3);
            $table->char('nama_dusun', 20);
            $table->char('desa_kelurahan', 20);
            $table->char('kecamatan', 20);
            $table->char('kode_pos', 5);
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
        Schema::drop('tbl_lahan');
    }
};
