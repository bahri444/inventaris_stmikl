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
        Schema::create('tbl_sarana', function (Blueprint $table) {
            $table->id('id_sarana');
            $table->foreignId('id_ruang');
            $table->string('nama_sarana', 50);
            $table->string('spesifikasi', 50);
            $table->char('kepemilikan_sarana', 15);
            $table->char('jumlah_total', 3);
            $table->timestamps();
            $table->foreign('id_ruang')->references('id_ruang')->on('tbl_ruang')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_sarana');
    }
};
