<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTemposIntermediosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tempos_intermedios', function(Blueprint $table)
		{
			$table->foreign('id_carro')->references('id_carro')->on('carros')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('id_rally')->references('id_rally')->on('rally')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tempos_intermedios', function(Blueprint $table)
		{
			$table->dropForeign('tempos_intermedios_id_carro_foreign');
			$table->dropForeign('tempos_intermedios_id_rally_foreign');
		});
	}

}
