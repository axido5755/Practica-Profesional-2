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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_Usuario');
            $table->foreign('ID_Usuario')->references('ID_Usuario')->on('usuarios')->onDelete('cascade');
            $table->unsignedBigInteger('ID_Tutoria');
            $table->foreign('ID_Tutoria')->references('ID_Tutoria')->on('tutorias')->onDelete('cascade');
            $table->date('Fecha_Comentario');
            $table->string('Titulo');
            $table->text('Mensaje');
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
        Schema::dropIfExists('comentarios');
    }
};
