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
        Schema::create('aulas', function (Blueprint $table) {
            $table->id('id_aula');
            $table->integer('id_materia');
            $table->integer('horario_periodo'); //matutino = 1, vespertino = 2, noturno = 3
            $table->integer('horario_aula'); //cada período é separado em 3 horarios de aula já definidos. A separação será feita numericamente(aulas 1, 2 e 3)
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

        Schema::dropIfExists('aulas');
    }
};
