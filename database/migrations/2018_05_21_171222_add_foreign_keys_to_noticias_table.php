<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNoticiasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('noticias', function(Blueprint $table)
		{
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
		Schema::table('noticias', function(Blueprint $table)
		{
			$table->dropForeign('noticias_id_rally_foreign');
		});
	}

}
