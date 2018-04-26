<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemposIntermediosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempos_intermedios', function (Blueprint $table) {
            $table->increments('id_pec');
            $table->integer('id_rally')->unsigned();
            $table->integer('id_carro')->unsigned();
            $table->dateTime('tempoPartida', 2);
            $table->dateTime('tempoIntermedio_1', 2);
            $table->dateTime('tempoIntermedio_2', 2);
            $table->dateTime('tempoIntermedio_3', 2);
            $table->dateTime('tempoIntermedio_4', 2);
            $table->dateTime('tempoIntermedio_5', 2);
            $table->dateTime('tempoIntermedio_6', 2);
            $table->dateTime('tempoIntermedio_7', 2);
            $table->dateTime('tempoIntermedio_8', 2);
            $table->dateTime('tempoIntermedio_9', 2);
            $table->dateTime('tempoIntermedio_10', 2);
            $table->dateTime('tempoChegada', 2);
            $table->timestamps();
        });

        Schema::table('tempos_intermedios', function($table) {
            $table->foreign('id_rally')->references('id_rally')->on('rally')->onDelete('cascade');
            $table->foreign('id_carro')->references('id_carro')->on('carros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tempos_intermedios');
    }
}
