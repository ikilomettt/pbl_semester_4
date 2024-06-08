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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('genteng_id');
            $table->date('tanggal_pesanan');
            $table->bigInteger('total_pesanan');
            $table->integer('jumlah_genteng');
            $table->enum('status_pesanan',['sukses', 'belum'])->default('belum');


            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('genteng_id')->references('id')->on('gentengs');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
