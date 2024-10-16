<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('inventario', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('MaquinariaID');
            $table->foreign('MaquinariaID')->references('MaquinariaID')->on('maquinaria')->onDelete('cascade');

            $table->unsignedBigInteger('AlmacenID');
            $table->foreign('AlmacenID')->references('AlmacenID')->on('almacen')->onDelete('cascade');
                      
            $table->string('Codigo');
            $table->boolean('Estado');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('inventario');
    }
};

