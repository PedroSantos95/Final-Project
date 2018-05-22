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
			$table->increments('id_noticia');
			$table->integer('id_rally')->unsigned()->index('IX_FK_noticias_rallys');
			$table->string('titulo', 100);
			$table->boolean('id_tipo_noticia')->index('IX_FK_noticias_tipo_noticias');
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
