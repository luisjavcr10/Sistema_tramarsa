<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('guia_mantenimiento', function (Blueprint $table) {
            $table->id('GuiManID');
            $table->unsignedBigInteger('MaquinariaID');
            $table->foreign('MaquinariaID')->references('MaquinariaID')->on('maquinaria')->onDelete('cascade');

            $table->unsignedBigInteger('AlmacenID');
            $table->foreign('AlmacenID')->references('AlmacenID')->on('almacen')->onDelete('cascade');
            $table->string('Numero');
            $table->date('FechaInicio');
            $table->date('FechaFin')->nullable();
            $table->string('Serie');
            $table->string('Ubicacion');
            $table->text('Observaciones')->nullable();
            
            $table->unsignedBigInteger('EmpleadoID');
            $table->foreign('EmpleadoID')->references('EmpleadoID')->on('empleado')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('guia_mantenimiento');
    }
};

