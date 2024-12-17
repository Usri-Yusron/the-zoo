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
        Schema::create('hewans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('habitat_id');
            $table->unsignedBigInteger('makanan_id');
            $table->string('nama');
            $table->text('tentang');
            $table->text('detail_makanan');
            $table->float('panjang')->nullable();
            $table->float('berat')->nullable();
            $table->float('tinggi')->nullable();
            $table->string('image');
            $table->foreign('habitat_id')->references('id')->on('habitats')->onUpdate('cascade');
            $table->foreign('makanan_id')->references('id')->on('makanans')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hewans');
    }
};
