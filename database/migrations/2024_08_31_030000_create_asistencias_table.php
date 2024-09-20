<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('id_aprendiz'); // Columna de clave foránea para aprendiz
            // $table->unsignedBigInteger('id_event'); // Columna de clave foránea para evento
            // $table->json('datos_asistencia'); // Almacenar asistio, no_asistio y excusa en un JSON

            // // Definición correcta de claves foráneas
            // $table->foreign('id_aprendiz')->references('id')->on('aprendizs')->onDelete('cascade');
            // $table->foreign('id_event')->references('id')->on('events')->onDelete('cascade');
            $table->unsignedBigInteger('ficha_id');
            $table->json('asistieron');
            $table->json('no_asistieron');
            $table->json('evento'); //almacena nombre, hora, dia y mes (los 2 ultimos en forma de numero)

            $table->foreign('ficha_id')->references('id')->on('fichas')->onDelete('cascade');
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
