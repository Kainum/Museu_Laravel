<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventoSalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_salas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('evento_id')->unsigned()->nullable();
            $table->foreign('evento_id')->references('id')->on('eventos');
            $table->bigInteger('sala_id')->unsigned()->nullable();
            $table->foreign('sala_id')->references('id')->on('salas');
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
        Schema::dropIfExists('evento_salas');
    }
}
