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
        Schema::create('experiencias', function (Blueprint $table) {
            $table->id('id_experiencia');
            $table->string('titulo', 200);
            $table->text('descripcion')->nullable();
            $table->timestamp('fecha_publicacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('fecha_inicio_viaje')->nullable();
            $table->date('fecha_fin_viaje')->nullable();
            $table->enum('estado', ['borrador', 'publicado', 'archivado'])->default('borrador');
            $table->integer('votos_positivos')->default(0);
            $table->timestamp('fecha_actualizacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->binary('fotos')->nullable();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_destino');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_destino')->references('id_destino')->on('destinos')->onDelete('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencias');
    }
};
