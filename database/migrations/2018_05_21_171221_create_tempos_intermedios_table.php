<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTemposIntermediosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tempos_intermedios', function(Blueprint $table)
		{
			$table->integer('id_rally')->unsigned()->index('tempos_intermedios_id_rally_foreign');
			$table->increments('id_pec');
			$table->integer('id_carro')->unsigned()->index('tempos_intermedios_id_carro_foreign');
			$table->dateTime('tempoPartida')->nullable();
			$table->dateTime('tempoIntermedio_1')->nullable();
			$table->dateTime('tempoIntermedio_2')->nullable();
			$table->dateTime('tempoIntermedio_3')->nullable();
			$table->dateTime('tempoIntermedio_4')->nullable();
			$table->dateTime('tempoIntermedio_5')->nullable();
			$table->dateTime('tempoIntermedio_6')->nullable();
			$table->dateTime('tempoIntermedio_7')->nullable();
			$table->dateTime('tempoIntermedio_8')->nullable();
			$table->dateTime('tempoIntermedio_9')->nullable();
			$table->dateTime('tempoIntermedio_10')->nullable();
			$table->dateTime('tempoChegada');
			$table->timestamps();
			$table->unique(['id_pec','id_rally','id_carro']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tempos_intermedios');
	}

}
