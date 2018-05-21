<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('config', function(Blueprint $table)
		{
			$table->foreign('id_pec')->references('id_pec')->on('tempos_intermedios')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('numero_carro_referencia')->references('id_carro')->on('carros')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('config', function(Blueprint $table)
		{
			$table->dropForeign('config_id_pec_foreign');
			$table->dropForeign('config_numero_carro_referencia_foreign');
		});
	}

}
