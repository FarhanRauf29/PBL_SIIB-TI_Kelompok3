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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_pen_jwb');
            $table->unsignedBigInteger('barang_id');
            $table->integer('batas_waktu');
            $table->boolean('status')->default(1); // Ubah menjadi string untuk status peminjaman
            $table->text('feedback')->nullable(); // Ubah menjadi text untuk catatan, bisa null
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_pen_jwb')->references('id')->on('users');
            $table->foreign('barang_id')->references('id')->on('barangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
