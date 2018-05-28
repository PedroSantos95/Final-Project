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
			$table->foreign('id_rally', 'FK_carros_tempos_intermedios')->references('id')->on('carros')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_rally', 'FK_pecs_tempos_intermedios')->references('id_rally')->on('pecs')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
			$table->dropForeign('FK_carros_tempos_intermedios');
			$table->dropForeign('FK_pecs_tempos_intermedios');
		});
	}

}
