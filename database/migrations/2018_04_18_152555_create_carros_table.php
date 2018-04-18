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
            $table->increments('id_rally');
            $table->increments('piloto');
            $table->increments('navegador');
            $table->increments('nacionalidade');
            $table->increments('equipa');
            $table->increments('campeonato');
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
