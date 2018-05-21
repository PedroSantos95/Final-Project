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
			$table->increments('id_pec');
			$table->integer('id_rally')->unsigned()->index('tempos_intermedios_id_rally_foreign');
            $table->integer('id_carro')->unsigned()->index('tempos_intermedios_id_carro_foreign');
			$table->dateTime('tempoPartida');
			$table->dateTime('tempoIntermedio_1');
			$table->dateTime('tempoIntermedio_2');
			$table->dateTime('tempoIntermedio_3');
			$table->dateTime('tempoIntermedio_4');
			$table->dateTime('tempoIntermedio_5');
			$table->dateTime('tempoIntermedio_6');
			$table->dateTime('tempoIntermedio_7');
			$table->dateTime('tempoIntermedio_8');
			$table->dateTime('tempoIntermedio_9');
			$table->dateTime('tempoIntermedio_10');
			$table->dateTime('tempoChegada');
            $table->unique(['id_pec', 'id_rally', 'id_carro']);
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
		Schema::drop('tempos_intermedios');
	}

}
