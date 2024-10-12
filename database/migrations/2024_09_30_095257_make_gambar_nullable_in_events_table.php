<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('gambar')->nullable()->change(); // Make 'gambar' nullable
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('gambar')->nullable(false)->change(); // Revert back to non-nullable
        });
    }
};
