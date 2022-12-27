<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_tutorias', function (Blueprint $table) {
            $table->id('ID_Lista_Tutorias');
            $table->unsignedBigInteger('ID_Usuario');
            $table->foreign('ID_Usuario')->references('ID_Usuario')->on('usuarios');
            $table->string('Nombre_Lenguaje');
            $table->string('Descripcion');
            $table->date('Fecha_Creacion');
            $table->boolean('Activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista_tutorias');
    }
};
