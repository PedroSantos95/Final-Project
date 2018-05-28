<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRallysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rallys', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('numero_pecs');
			$table->string('nome', 100);
			$table->string('local', 100);
			$table->boolean('ativo');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rallys');
	}

}
