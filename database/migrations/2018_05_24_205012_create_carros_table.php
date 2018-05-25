<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carros', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->index('IX_carros_id_rally');
			$table->smallInteger('numero_carro')->unsigned();
			$table->string('piloto_nome', 100);
			$table->string('piloto_firstname_lastname', 50)->nullable();
			$table->string('piloto_firstchar_lastname', 30)->nullable();
			$table->string('piloto_shortname', 20)->nullable();
			$table->string('piloto_nacionalidade', 3)->nullable();
			$table->string('navegador_nome', 100);
			$table->string('navegador_firstname_lastname', 50)->nullable();
			$table->string('navegador_firstchar_lastname', 30)->nullable();
			$table->string('navegador_shortname', 20)->nullable();
			$table->string('navegador_nacionalidade', 3)->nullable();
			$table->string('equipa', 100);
			$table->string('campeonato', 20)->nullable();
			$table->primary(['id','numero_carro']);
			$table->unique(['id','numero_carro'], 'UN_carros_numero_carro_id_rally');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('carros');
	}

}
