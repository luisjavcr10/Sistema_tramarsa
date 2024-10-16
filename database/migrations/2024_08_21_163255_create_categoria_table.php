<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('categoria', function (Blueprint $table) {
            $table->id('CategoriaID');
            $table->string('Codigo');
            $table->string('Nombre');
            $table->string('Descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('categoria');
    }
};

