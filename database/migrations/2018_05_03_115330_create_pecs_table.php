<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePecsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('pecs', function(Blueprint $table)
        {
            $table->increments('id_pec');
            $table->integer('id_rally')->unsigned()->index('carros_id_rally_foreign');
            $table->string('nome');
            $table->string('dataInicio');
            $table->string('distancia');
            $table->integer('numeroPontosReferencia');
            $table->integer('numeroCarroReferencia');
            $table->unique(['id_pec', 'id_rally']);
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
		Schema::table('pecs', function(Blueprint $table)
		{
			$table->dropForeign('noticias_id_rally_foreign');
		});
	}

}
