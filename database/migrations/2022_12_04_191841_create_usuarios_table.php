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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('ID_Usuario');
            $table->unsignedBigInteger('ID_Rol');
            $table->foreign('ID_Rol')->references('ID_Rol')->on('rols');
            $table->string('Nombre');
            $table->string('Apellido');
            $table->string('Rut');
            $table->string('Email');
            $table->string('Contraseña');
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
        Schema::dropIfExists('usuarios');
    }
};
