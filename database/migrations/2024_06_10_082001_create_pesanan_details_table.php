<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan_details', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_pesanan');
            $table->integer(column: 'total_harga');
            $table->boolean('namaset')->default(0);
            $table->string('nama')->nullable();
            $table->integer('nomor')->nullable();
            $table->foreignId('product_id');
            $table->foreignId('pesanan_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_details');
    }
};
