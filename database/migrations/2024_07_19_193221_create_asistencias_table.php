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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->boolean('noAsistencias');
            $table->boolean('noInasistencias');
            $table->boolean('noExcusas');
            $table->string('comentario');
            $table->unsignedBigInteger('aprendiz_id');

            $table->foreign('aprendiz_id')->references('id')->on('aprendizs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
