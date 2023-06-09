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
        Schema::create('tbl_bangunan', function (Blueprint $table) {
            $table->id('id_bangunan');
            $table->foreignId('id_tanah');
            $table->string('jenis_bangunan', 30);
            $table->string('nama_bangunan', 30);
            $table->char('panjang_bangunan', 3);
            $table->char('lebar_bangunan', 3);
            $table->char('luas_tapak', 3);
            // $table->string('kepemilikan', 15);
            $table->char('tahun_dibangun', 4);
            $table->date('tanggal_sk_pemakaian');
            $table->timestamps();
            $table->foreign('id_tanah')->references('id_tanah')->on('tbl_tanah')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_bangunan');
    }
};
