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
        Schema::create('cardapios', function (Blueprint $table) {
            $table->id('id_item');
            $table->integer('id_loja');
            $table->string('item', 50);
            $table->double('item_preco', 6, 2);
            $table->timestamps();

            $table->foreign('id_loja')->references('id_loja')->on('lanchonetes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('cardapios');
    }
};
