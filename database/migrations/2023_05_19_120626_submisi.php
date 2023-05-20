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
        Schema::create('sub_misi', function (Blueprint $table) {
            $table->id('id_sub_misi');
            $table->foreignId('id_misi');
            $table->string('point_sub_misi');
            $table->timestamps();
            $table->foreign('id_misi')->references('id_misi')->on('misi')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sub_misi');
    }
};
