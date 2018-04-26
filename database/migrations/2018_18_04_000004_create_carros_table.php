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
            $table->string('piloto');
            $table->string('navegador');
            $table->string('nacionalidade');
            $table->string('equipa');
            $table->string('campeonato');
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
