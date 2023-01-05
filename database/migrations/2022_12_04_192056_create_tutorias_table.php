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
        Schema::create('tutorias', function (Blueprint $table) {
            $table->id('ID_Tutoria');
            $table->unsignedBigInteger('ID_Lista_Tutorias');
            $table->foreign('ID_Lista_Tutorias')->references('ID_Lista_Tutorias')->on('lista_tutorias')->onDelete('cascade');
            $table->string('Titulo');
            $table->integer('Numeracion');
            $table->text('Contenido')-> nullable();
            $table->string('Link_Video');
            $table->Date('Fecha_Publicacion');
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
        Schema::dropIfExists('tutorias');
    }
};
