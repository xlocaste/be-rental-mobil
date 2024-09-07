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
        Schema::create('daftar_mobil', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nama');
            $table->string('merk');
            $table->integer('kursi');
            $table->string('bahan_bakar');
            $table->float('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_mobil');
    }
};
