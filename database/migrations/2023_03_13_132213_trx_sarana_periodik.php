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
        Schema::create('trx_sarana_periodik', function (Blueprint $table) {
            $table->id('id_transaksi_sarana');
            $table->foreignId('id_sarana');
            $table->foreignId('id_tahun_akademik');
            $table->char('jumlah_like', 3);
            $table->timestamps();
            $table->foreign('id_sarana')->references('id_sarana')->on('tbl_sarana')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::drop('trx_sarana_periodik');
    }
};
