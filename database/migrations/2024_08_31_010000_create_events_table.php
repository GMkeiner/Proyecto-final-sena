<?php

// database/migrations/2024_08_23_000000_create_events_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ficha_id');
            $table->json('mes1')->nullable();
            $table->json('mes2')->nullable(); 
            $table->json('mes3')->nullable();
            $table->json('hora')->nullable();

            $table->foreign('ficha_id')->references('id')->on('fichas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}

