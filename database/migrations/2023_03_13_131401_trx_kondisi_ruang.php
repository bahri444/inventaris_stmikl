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
        Schema::create('trx_kondisi_ruang', function (Blueprint $table) {
            $table->foreignId('id_ruang');
            $table->foreignId('id_tahun_akademik');
            $table->enum('kerusakan', ['tidak ada kerusakan', 'rusak sedang', 'rusak berat']);
            $table->char('nilai_kerusakan', 2);
            $table->timestamps();
            $table->foreign('id_ruang')->references('id_ruang')->on('tbl_ruang')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_tahun_akademik')->references('id_tahun_akademik')->on('tahun_akademik')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trx_kondisi_ruang');
    }
};
