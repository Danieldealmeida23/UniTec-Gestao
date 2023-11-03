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
        Schema::create('financeiros', function (Blueprint $table) {
            $table->integer('id_usuario');
            $table->integer('id_uso_estacionamento')->nullable();
            $table->integer('id_pedido')->nullable();
            $table->date('data_parcela');
            $table->double('valor',6 ,2);
            $table->string('status_pg', 20);
            $table->string('cond_pg', 20)->nullable();
            $table->date('data_pagamento')->nullable();
            $table->string('descricao', 50);
            $table->timestamps();


            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('id_pedido')->references('id_pedido')->on('pedidos');
            $table->foreign('id_uso_estacionamento')->references('id_uso_estacionamento')->on('estacionamentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financeiros');
    }
};
