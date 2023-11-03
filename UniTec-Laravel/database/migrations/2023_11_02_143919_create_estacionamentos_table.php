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
        Schema::create('estacionamentos', function (Blueprint $table) {
            $table->id('id_vaga');
            $table->string('loc_vaga');
            $table->string('status_vaga', 20);
            $table->date('data_hora_entrada')->nullable();
            $table->integer('id_usuario_ocupante')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estacionamentos');
    }
};
