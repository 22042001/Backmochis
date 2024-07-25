<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('foro_respuestas', function (Blueprint $table) {
            $table->id('id_foro_respuesta');
            $table->text('contenido');
            $table->timestamp('fecha')->default(DB::raw('CURRENT_TIMESTAMP')); 
            $table->unsignedBigInteger('id_foro_tema');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_foro_tema')->references('id_foro_tema')->on('foro_temas')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foro_respuestas');
    }
};
