<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('accion', function (Blueprint $table) {
            $table->id('AccionID');
            $table->string('Nombre');
            $table->boolean('Estado');
            $table->unsignedBigInteger('RolID');
            $table->foreign('RolID')->references('RolID')->on('rol')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('accion');
    }
};

