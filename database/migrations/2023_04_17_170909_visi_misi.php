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
        Schema::create('visi_misi', function (Blueprint $table) {
            $table->id('id_visi_misi');
            $table->foreignId('kode_program_studi');
            $table->longText('visi');
            $table->longText('misi');
            $table->timestamps();
            $table->foreign('kode_program_studi')->references('kode_program_studi')->on('program_studi')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('visi_misi');
    }
};
