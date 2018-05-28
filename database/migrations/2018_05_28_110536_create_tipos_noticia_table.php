<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTiposNoticiaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tipos_noticia', function(Blueprint $table)
		{
			$table->boolean('id')->primary();
			$table->string('nome', 40);
			$table->string('path_white', 100);
			$table->string('path_black', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tipos_noticia');
	}

}
