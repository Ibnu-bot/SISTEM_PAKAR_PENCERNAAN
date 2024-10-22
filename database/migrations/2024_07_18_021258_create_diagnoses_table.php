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
        Schema::create('diagnosis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->nullable()->constrained('pasiens')->onDelete('cascade');
            $table->foreignId('gejala_id')->nullable()->constrained('gejalas')->onDelete('cascade');
            $table->foreignId('penyakit_id')->nullable()->constrained('penyakits')->onDelete('cascade');
            $table->double('nilai_cf', 8, 3)->nullable();
            $table->double('cf_hasil', 8, 3)->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosis');
    }
};
