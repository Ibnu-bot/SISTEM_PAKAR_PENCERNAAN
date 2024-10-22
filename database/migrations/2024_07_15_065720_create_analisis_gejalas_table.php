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
        Schema::create('analisis_gejalas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gejala1_id')->constrained('gejalas')->onDelete('cascade');
            $table->foreignId('gejala2_id')->constrained('gejalas')->onDelete('cascade');
            $table->double('nilai', 8, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analisis_gejalas');
    }
};
