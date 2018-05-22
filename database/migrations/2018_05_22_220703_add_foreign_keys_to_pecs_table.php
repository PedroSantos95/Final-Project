<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPecsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pecs', function(Blueprint $table)
		{
			$table->foreign('id_rally', 'FK_pecs_rallys')->references('id_rally')->on('rallys')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pecs', function(Blueprint $table)
		{
			$table->dropForeign('FK_pecs_rallys');
		});
	}

}
