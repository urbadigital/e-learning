<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcontenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('subcontenidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_subcontenido');
            $table->text('descripcion_subcontenido')->comment="descripcion del SUB contenido informacion previa al test";
            

            $table->boolean('estado_subcontenido')->comment="1 habilitado 2 desabilitado";
            


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
        Schema::dropIfExists('subcontenidos');
    }
}
