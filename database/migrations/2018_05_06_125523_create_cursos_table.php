<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_curso');
            $table->text('descripcion_curso');
            $table->text('descripcion_cortas_curso');
            $table->string('imagen_curso');
            $table->integer('tipo_nivel_curso')->comment="1 basico; 2 pre-Intermedio, 3 Intermedio, 4 Experto ";
           
            
            $table->integer('tipo_curso')->comment="tipo de curso gratis o pago";
            $table->integer('costo')->comment="valor del curso";
                     
            $table->date('tiempo_inicio_curso')->comment="inicio de curso";
            $table->date('tiempo_fin_curso')->comment="fin de curso";
            $table->boolean('estado_curso')->comment="1 habilitado 2 desabilitado";



            $table->integer('tema_id')->unsigned()->index();
            $table->foreign('tema_id')->references('id')->on('temas')->onDelete('cascade');

           

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
        Schema::dropIfExists('cursos');
    }
}
