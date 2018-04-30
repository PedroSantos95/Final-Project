<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->increments('id_carro');
            $table->integer('id_rally')->unsigned();
            $table->string('marcaModelo');
            $table->string('pilotoNome');
            $table->string('pilotoNacionalidade');
            $table->string('navegadorNome');
            $table->string('navegadorNacionalidade');
            $table->string('equipaNome');
            $table->string('equipaNacionalidade');
            $table->string('campeonatos');
            $table->string('pilotoNavegador_FirstLastName');
            $table->string('pilotoNavegador_FirstCharLastName');
            $table->string('pilotoNavegador_ShortNames');
            $table->timestamps();
        });

        Schema::table('carros', function($table) {
            $table->foreign('id_rally')->references('id_rally')->on('rally');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carros');
    }
}
