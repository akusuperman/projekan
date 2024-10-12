<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('Tanggal_booking');
            $table->time('jam_masuk'); 
            $table->time('jam_keluar');
            $table->bigInteger('id_orang', false)->unsigned();
            $table->bigInteger('id_lapangan', false)->unsigned();
            $table->timestamps();
            $table->foreign('id_orang')->references('id')->on('orang');
            $table->foreign('id_lapangan')->references('id')->on('lapangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
