<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivoPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('archivo_preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_archivo_pregunta');
            $table->string('descripcion_archivo_pregunta');
            



            $table->integer('preguntas_id')->unsigned()->index();
            $table->foreign('preguntas_id')->references('id')->on('preguntas')->onDelete('cascade');

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
        Schema::dropIfExists('archivo_preguntas');
    }
}
