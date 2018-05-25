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
			$table->integer('id_rally')->unsigned();
			$table->boolean('id_pec');
			$table->smallInteger('numero_carro')->unsigned();
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
			$table->dateTime('tempoChegada')->nullable();
			$table->timestamps();
			$table->primary(['id_rally','id_pec','numero_carro']);
			$table->unique(['id_rally','id_pec','numero_carro'], 'UN_tempos_intermedios_id_rally_id_pec_numero_carro');
			$table->index(['id_rally','numero_carro'], 'IX_FK_carros_tempos_intermedios');
			$table->index(['id_rally','id_pec'], 'IX_FK_pecs_tempos_intermedios');
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
