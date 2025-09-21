<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('servicios', function (Blueprint $table) {
        $table->id();
        $table->string('nombre'); // nombre del servicio
        $table->text('descripcion')->nullable(); // detalle opcional
        $table->string('horario'); // horario de atención
        $table->string('imagen')->nullable(); // ruta de la imagen
        $table->timestamps();
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
