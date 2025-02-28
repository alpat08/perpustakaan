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
        Schema::create('cerita_buku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buku_id')->constrained()->OnDelete('cascade');
            $table->foreignId('cerita_id')->constrained()->OnDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cerita_buku');
    }
};
