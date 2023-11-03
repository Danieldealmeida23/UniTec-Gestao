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
        Schema::create('financeiro_estacionamentos', function (Blueprint $table) {
            $table->id('id_uso_estacionamento');
            $table->integer('id_vaga');
            $table->integer('status_pagamento');
            $table->integer('data_hora_saida')->nullable();
            $table->timestamps();

            $table->foreign('id_vaga')->references('id_vaga')->on('estacionamentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financeiro_estacionamentos');
    }
};
