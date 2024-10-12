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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id', false)->unsigned();
            $table->string('username', 100)->unique();
            $table->string('email', 100)->unique();
            $table->string('role')->default('Reguler');
            $table->string('password');
            $table->string('nama', 200);
            $table->string('alamat');
            $table->string('no_hp', 20);
            $table->string('foto', 200)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
