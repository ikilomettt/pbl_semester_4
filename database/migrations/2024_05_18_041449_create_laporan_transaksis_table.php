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
        Schema::create('laporan_transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pesanan_id');
            
            $table->foreign('pesanan_id')->references('id')->on('pesanans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_transaksis');
    }
};
