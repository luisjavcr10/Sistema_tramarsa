<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('documento', function (Blueprint $table) {
            $table->id('DocumentoID');

            $table->unsignedBigInteger('GuiManID')->nullable();
            $table->foreign('GuiManID')->references('GuiManID')->on('guia_mantenimiento')->onDelete('set null');

            $table->unsignedBigInteger('MaquinariaID')->nullable();
            $table->foreign('MaquinariaID')->references('MaquinariaID')->on('maquinaria')->onDelete('set null');

            $table->unsignedBigInteger('AlmacenID')->nullable();
            $table->foreign('AlmacenID')->references('AlmacenID')->on('almacen')->onDelete('set null');

            $table->unsignedBigInteger('OrdUsoID')->nullable();
            $table->foreign('OrdUsoID')->references('OrdUsoID')->on('orden_uso')->onDelete('set null');

            $table->string('Documento');
            $table->string('Nombre');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('documento');
    }
};

