<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('maquinaria', function (Blueprint $table) {
            $table->id('MaquinariaID');
            $table->string('Codigo');
            $table->string('Nombre');
            $table->string('Marca');
            $table->string('Modelo');
            $table->unsignedBigInteger('CategoriaID');
            $table->foreign('CategoriaID')->references('CategoriaID')->on('categoria')->onDelete('cascade');
            $table->timestamps();

            
        
            
        });
    }

    public function down(): void {
        Schema::dropIfExists('maquinaria');
    }
};

