<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carros', function(Blueprint $table)
		{
			$table->integer('id_rally')->unsigned()->index('carros_id_rally_foreign');
			$table->increments('id_carro');
			$table->string('piloto');
			$table->string('navegador');
			$table->string('nacionalidade');
			$table->string('equipa');
			$table->string('campeonato');
			$table->timestamps();
			$table->unique(['id_carro','id_rally']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('carros');
	}

}
