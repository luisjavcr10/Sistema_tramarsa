<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t2', function (Blueprint $table) {
            $table->id();
            $table->integer('duracion');
            $table->unsignedBigInteger('GuiManID');
            $table->foreign('GuiManID')->references('GuiManID')->on('guia_mantenimiento')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t2');
    }
};
