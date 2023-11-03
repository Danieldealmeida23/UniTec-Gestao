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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->integer('id_pessoa');
            $table->string('senha');
            $table->integer('id_professor')->nullable();
            $table->integer('id_aluno')->nullable();
            $table->integer('id_loja')->nullable();
            $table->integer('id_curso')->nullable();
            $table->timestamps();

            $table->foreign('id_pessoa')->references('id_pessoa')->on('pessoas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('usuarios');
    }
};
