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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->integer('nota1');
            $table->integer('nota2');
            $table->integer('nota3');
            $table->integer('promedio');
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
        Schema::dropIfExists('notas');
    }
};
