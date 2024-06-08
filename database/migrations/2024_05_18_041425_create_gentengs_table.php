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
        Schema::create('gentengs', function (Blueprint $table) {
            $table->id();
            $table->string('gambar_genteng');
            $table->string('nama_genteng');
            $table->string('deskripsi');
            $table->bigInteger('harga');
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gentengs');
    }
};
