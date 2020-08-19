<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_tutor')->comment= "descripcion tutor";
            $table->string('video_tutor')->comment= "video tutor";
            
            $table->boolean('estado_tutor')->comment=" verdadero falso";

            $table->integer('user_id')->unsigned()->index()->comment="Id para usuario instructor";
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            



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
        Schema::dropIfExists('tutors');
    }
}
