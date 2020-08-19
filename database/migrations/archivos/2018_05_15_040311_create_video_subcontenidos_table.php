<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoSubcontenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_subcontenidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_video_subcontenido');
            $table->string('descripcion_video_subcontenido');
            $table->string('url_video_subcontenido');



            $table->integer('subcontenido_id')->unsigned()->index();
            $table->foreign('subcontenido_id')->references('id')->on('subcontenidos')->onDelete('cascade');

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
        Schema::dropIfExists('video_subcontenidos');
    }
}
