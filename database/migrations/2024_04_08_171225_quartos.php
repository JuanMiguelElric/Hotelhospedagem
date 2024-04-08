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
        Schema::create('quartos', function(Blueprint $table){
            $table->integer('id');
            $table->string('quarto');
            $table->binary('imagens');
            $table->string('descricao');
            $table->string('valor');
            $table->unsignedInteger('hotel_id');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quartos');
    }
};
