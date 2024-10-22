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
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_penyakit')->unsigned();
            $table->bigInteger('id_gejala')->unsigned();
            $table->double('cf_pakar', 8, 3);
            $table->timestamps();

            // Define foreign keys
            $table->foreign('id_penyakit')->references('id')->on('penyakits')->onDelete('cascade');
            $table->foreign('id_gejala')->references('id')->on('gejalas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rules');
    }
};
