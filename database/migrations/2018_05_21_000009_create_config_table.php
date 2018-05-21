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
			$table->tinyInteger('id_pec')->unsigned()->references('id_pec')->on('pecs')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->integer('numero_tempos_intermedios')->unsigned();
			$table->integer('numero_carro_referencia')->unsigned();
            $table->foreign('numero_carro_referencia')->references('id_carro')->on('carros')->onUpdate('RESTRICT')->onDelete('CASCADE');
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
