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
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal_event');
            $table->time('jam_mulai'); 
            $table->time('jam_selesai');
            $table->string('nama_event');
            $table->text('deskripsi');
            $table->string('gambar');
            $table->string('lokasi')->defaultValue('GFI Futsal Center');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
