<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id();
            $table->string('mensaje');
            $table->boolean('visto')->default(false); // Para marcar si el pop-up ya se mostró
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};
