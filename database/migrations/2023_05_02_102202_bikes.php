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
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->uuid('unique')->unique();
            $table->string('no_polisi');
            $table->string('merek');
            $table->string('type');
            $table->integer('tahun_pembuatan');
            $table->string('daya');
            $table->string('no_rangka');
            $table->string('bahan_bakar');
            $table->string('bpkb');
            $table->string('berlaku_sampai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bikes');
    }
};
