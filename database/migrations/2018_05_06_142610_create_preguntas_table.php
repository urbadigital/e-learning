<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descripcion_pregunta');
            $table->text('solucion_pregunta');
            $table->integer('tipo_pregunta')->comment="1 seleccion multiple , 2 seleccion unica";
            $table->boolean('estado_pregunta')->comment="1 habilitado 2 desabilitado";
            $table->integer('tests_id')->unsigned()->index();
            $table->foreign('tests_id')->references('id')->on('tests')->onDelete('cascade');
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
        Schema::dropIfExists('preguntas');
    }
}
