<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePecsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pecs', function(Blueprint $table)
		{
			$table->integer('id_rally')->unsigned()->index('carros_id_rally_foreign');
			$table->tinyInteger('id_pec');
			$table->string('nome');
			$table->dateTime('dataInicio');
			$table->float('distancia', 10, 0)->unsigned();
			$table->boolean('numeroPontosReferencia');
			$table->smallInteger('numeroCarroReferencia')->unsigned();
			$table->unique(['id_rally','id_pec']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pecs');
	}

}
