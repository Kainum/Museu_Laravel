<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToArtefatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artefatos', function (Blueprint $table) {
            $table->bigInteger('sala_id')->unsigned()->nullable();
            $table->foreign('sala_id')->references('id')->on('salas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artefatos', function (Blueprint $table) {
            //
        });
    }
}
