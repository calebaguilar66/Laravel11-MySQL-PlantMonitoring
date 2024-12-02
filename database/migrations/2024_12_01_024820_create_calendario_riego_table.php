<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('calendario_riego', function (Blueprint $table) {
            $table->id();
            $table->date('fecha'); // Columna para la fecha
            $table->time('hora'); // Columna para la hora
            $table->timestamps(); // Incluye created_at y updated_at
        });
    }

    public function down():void
    {
        Schema::dropIfExists('calendario_riego');
    }
};
