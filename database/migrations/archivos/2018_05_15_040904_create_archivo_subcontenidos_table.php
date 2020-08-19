<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivoSubcontenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivo_subcontenidos', function (Blueprint $table) {
            $table->increments('id');


            $table->string('nombre_archivo_subcontenido');
            $table->string('descripcion_archivo_subcontenido');
            



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
        Schema::dropIfExists('archivo_subcontenidos');
    }
}
