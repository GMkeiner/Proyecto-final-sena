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
        Schema::create('encuestas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aprendiz_id');
            $table->string('respuesta1',10);
            $table->string('respuesta2',10);
            $table->string('respuesta3',10);
            $table->string('respuesta4',10);
            $table->string('respuesta5',10);
            $table->string('respuesta6',10);
            $table->string('respuesta7',10);
            $table->foreign('aprendiz_id')->references('id')->on('aprendizs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuestas');
    }
};
