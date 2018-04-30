<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pecs', function (Blueprint $table) {
            $table->increments('id_pec');
            $table->integer('id_rally')->nullable()->unsigned();
            $table->string('nome');
            $table->date('dataInicio');
            $table->integer('distancia');
            $table->integer('numeroTemposIntermedios');
            $table->integer('numeroCarroReferencia');
            $table->timestamps();
        });

        Schema::table('pecs', function($table) {
            $table->foreign('id_rally')->references('id_rally')->on('rally')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pecs');
    }
}
