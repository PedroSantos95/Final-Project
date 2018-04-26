<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pec')->unsigned();
            $table->integer('numero_tempos_intermedios');
            $table->integer('numero_carro_referencia')->unsigned();
            $table->timestamps();
        });


        Schema::table('config', function($table) {
            $table->foreign('id_pec')->references('id_pec')->on('tempos_intermedios')->onDelete('cascade');
            $table->foreign('numero_carro_referencia')->references('id_carro')->on('carros')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config');
    }
}
