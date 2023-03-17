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
            $table->id('id_sarana_periodik');
            $table->foreignId('id_sarana');
            $table->char('jumlah_totalt_trx', 3);
            $table->char('jumlah_like_trx', 3);
            $table->timestamps();
            $table->foreign('id_sarana')->references('id_sarana')->on('tbl_sarana')->cascadeOnUpdate()->cascadeOnDelete();
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
