<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_rally')->unsigned()->nullable();
            $table->integer('tipoNoticia')->unsigned()->nullable();
            $table->string('titulo');
            $table->boolean('visivel');
            $table->string('informacao');
            $table->timestamps();
        });

        Schema::table('noticias', function($table) {
            $table->foreign('id_rally')->references('id_rally')->on('rally')->onDelete('cascade');
            $table->foreign('tipoNoticia')->references('id_tipoNoticia')->on('tipo_noticia')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias');
    }
}
