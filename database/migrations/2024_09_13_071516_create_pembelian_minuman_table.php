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
        Schema::create('pembelian_minuman', function (Blueprint $table) {
            $table->bigInteger('id_orang', false)->unsigned();
            $table->bigInteger('id_minuman', false)->unsigned();
            $table->string('metode_pembayaran');
            $table->integer('discount'); 
            $table->timestamps();
            $table->foreign('id_orang')->references('id')->on('orang');
            $table->foreign('id_minuman')->references('id')->on('minuman');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian_minuman');
    }
};
