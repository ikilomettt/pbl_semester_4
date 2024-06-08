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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pesanan_id');
            $table->date('tanggal_pembayaran');
            $table->string('metode_pembayaran');
            $table->string('jumlah_pembayaran');
            $table->string('bukti_pembayaran')->default('GAMBAR APIK');

            $table->foreign('pesanan_id')->references('id')->on('pesanans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
