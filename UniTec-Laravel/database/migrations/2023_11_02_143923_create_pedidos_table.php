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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('id_solicitacao_pedido');
            $table->integer('id_pedido');
            $table->integer('id_pedido_item');
            $table->integer('qtd_item');
            $table->string('status_pedido', 20);
            $table->integer('id_usuario');
            $table->timestamps();

            $table->foreign('id_pedido_item')->references('id_item')->on('cardapios');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
