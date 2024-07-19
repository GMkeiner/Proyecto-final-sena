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
        Schema::create('aprendizs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('apellido');
            $table->string('correo', 200);
            $table->bigInteger('Telefono');
            $table->unsignedBigInteger('ficha_id');
            $table->unsignedBigInteger('nota_id');
            $table->unsignedBigInteger('asistencia_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aprendizs');
    }
};
