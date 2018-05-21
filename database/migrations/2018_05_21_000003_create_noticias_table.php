<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNoticiasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('noticias', function(Blueprint $table)
		{
            $table->integer('id_rally')->unsigned()->nullable()->index('noticias_id_rally_foreign');
			$table->increments('id');
			$table->string('titulo');
			$table->tinyInteger('tipo_noticia_id');
			$table->string('file')->nullable();
			$table->boolean('visivel');
			$table->string('informacao');
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
		Schema::drop('noticias');
	}

}
