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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('id_kategori')->constrained('kategori')->onDelete('cascade');
            $table->bigInteger('harga');
            $table->enum('lokasi', ['gudang', 'estalase'])->default('gudang');
            $table->foreignId('id_toko')->nullable()->constrained('toko')->onDelete('cascade');
            // $table->integer('stock');
            $table->string('qr_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
