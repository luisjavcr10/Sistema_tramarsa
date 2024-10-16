<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('empleado', function (Blueprint $table) {
            $table->id('EmpleadoID');
            $table->string('Nombre');
            $table->string('Apellido');
            $table->string('DNI')->unique();
            $table->boolean('Estado');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('empleado');
    }
};

