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
        Schema::create('juduls', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('abstrak');
            $table->enum('status', ['diterima', 'ditolak', 'belum diproses'])->default('belum diproses');
            $table->string('alasan')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('surat_bimbingan')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juduls');
    }
};
