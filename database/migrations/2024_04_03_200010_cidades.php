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
        Schema::create('cidades',function(Blueprint $table){
            $table->integer('id');
            $table->string('estado');
            $table->string('cidade');
            $table->string('cep');
            $table->unsignedInteger('dono_hotel_id');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cidades');
    }
};
