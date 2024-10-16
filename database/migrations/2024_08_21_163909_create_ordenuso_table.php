<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('orden_uso', function (Blueprint $table) {
            $table->id('OrdUsoID');
            $table->unsignedBigInteger('MaquinariaID');
            $table->foreign('MaquinariaID')->references('MaquinariaID')->on('maquinaria')->onDelete('cascade');

            $table->unsignedBigInteger('AlmacenID');
            $table->foreign('AlmacenID')->references('AlmacenID')->on('almacen')->onDelete('cascade');
            
            $table->string('Numero');
            $table->date('FechaInicio');
            $table->date('FechaFin')->nullable();
            $table->string('Ubicacion');
            $table->boolean('Estado');

            $table->unsignedBigInteger('EmpleadoID');
            $table->foreign('EmpleadoID')->references('EmpleadoID')->on('empleado')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('orden_uso');
    }
};

