<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('config', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_pec')->unsigned()->index('config_id_pec_foreign');
			$table->integer('numero_tempos_intermedios');
			$table->integer('numero_carro_referencia')->unsigned()->index('config_numero_carro_referencia_foreign');
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
		Schema::drop('config');
	}

}
