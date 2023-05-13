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
        Schema::create('seles', function (Blueprint $table) {
            $table->id();
            $table->uuid('unique')->unique();
            $table->string('nota')->unique();
            $table->string('pembeli');
            $table->integer('bike_id');
            $table->date('tanggal_jual');
            $table->string('harga_beli');
            $table->string('harga_jual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seles');
    }
};
