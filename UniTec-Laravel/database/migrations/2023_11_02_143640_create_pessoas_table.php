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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id('id_pessoa');
            $table->string('nome_pessoa', 100);
            $table->string('nome_fantasia', 100)->nullable();
            $table->char('cpf', 11)->unique()->nullable();
            $table->char('cnpj', 14)->unique()->nullable();
            $table->string('endereco', 200);
            $table->char('tipo_pessoa', 1); //f = física, j = juridica
            $table->string('email', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};
