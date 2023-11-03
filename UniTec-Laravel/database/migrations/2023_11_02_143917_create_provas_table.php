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
        Schema::create('provas', function (Blueprint $table) {
            $table->id('id_prova');
            $table->string('local_arquivo', 200);
            $table->integer('id_materia');
            $table->integer('id_professor');
            $table->timestamps();

            $table->foreign('id_professor')->references('id_professor')->on('usuarios');
            $table->foreign('id_materia')->references('id_materia')->on('materias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('provas');
    }
};
