<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoContenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_contenidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_video_contenido');
            $table->string('descripcion_video_contenido');
            $table->string('url_video_contenido');



            $table->integer('contenido_id')->unsigned()->index();
            $table->foreign('contenido_id')->references('id')->on('contenidos')->onDelete('cascade');



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
        Schema::dropIfExists('video_contenidos');
    }
}
