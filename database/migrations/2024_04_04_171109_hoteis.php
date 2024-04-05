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
        Schema::create('hoteis', function(Blueprint $table){
            $table->id();
            $table->string('nome_hotel');
            $table->string('cnpj');
            $table->string('telefone1');
            $table->string('telefone2');
            $table->string('cep');
            $table->string('cidade');
            $table->string('estado');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('numero');
            $table->unsignedInteger('dono_hotel_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
