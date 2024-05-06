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
       Schema::create('pedidosnaofinalizados', function(Blueprint $table){
            $table->id();
            $table->unsignedInteger('quarto_id');
            $table->unsignedInteger('hotel_id');
            $table->unsignedInteger('usuario_id');
            $table->date('data_inical');
            $table->date('data_final');
            $table->string('valor_Total');
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
