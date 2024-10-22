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
        Schema::create('analisis_penyakits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penyakit1');
            $table->unsignedBigInteger('penyakit2');
            $table->double('nilai', 8, 3);
            $table->timestamps();

            $table->foreign('penyakit1')->references('id')->on('penyakits')->onDelete('cascade');
            $table->foreign('penyakit2')->references('id')->on('penyakits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analisis_penyakits');
    }
};
