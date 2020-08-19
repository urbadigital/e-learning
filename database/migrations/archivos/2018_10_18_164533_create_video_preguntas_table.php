<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration; 

class CreateVideoPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_video_pregunta');
            $table->string('descripcion_video_pregunta');
            $table->string('url_video_pregunta');



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
        Schema::dropIfExists('video_preguntas');
    }
}
