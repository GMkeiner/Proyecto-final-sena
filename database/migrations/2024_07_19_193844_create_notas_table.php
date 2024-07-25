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
        Schema::create('competencias_notas', function (Blueprint $table) {
            $table->id();
            $table->json('competencia1');
            $table->json('competencia2');
            $table->json('competencia3');
            $table->unsignedBigInteger('aprendiz_id');
            $table->timestamps();

            $table->foreign('aprendiz_id')->references('id')->on('aprendizs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competencias_notas');
    }
};
