<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivoContenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivo_contenidos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre_archivo_contenido');
            $table->string('descripcion_archivo_contenido');
            



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
        Schema::dropIfExists('archivo_contenidos');
    }
}
