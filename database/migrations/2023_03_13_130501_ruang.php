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
        Schema::create('tbl_ruang', function (Blueprint $table) {
            $table->id('id_ruang');
            $table->foreignId('id_bangunan');
            $table->char('kode_ruang', 30);
            $table->string('nama_ruang', 30);
            $table->char('panjang_ruang', 3);
            $table->char('lebar_ruang', 3);
            $table->string('luas_ruang', 30);
            $table->string('kapasitas', 30);
            $table->timestamps();
            $table->foreign('id_bangunan')->references('id_bangunan')->on('tbl_bangunan')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_ruang');
    }
};
