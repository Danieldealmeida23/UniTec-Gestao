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
        Schema::create('chamadas', function (Blueprint $table) {
            $table->id('id_chamada');
            $table->integer('id_aula');
            $table->integer('id_aluno');
            $table->timestamps();

            $table->foreign('id_aluno')->references('id_aluno')->on('usuarios');
            $table->foreign('id_aula')->references('id_aula')->on('aulas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamadas');
    }
};
