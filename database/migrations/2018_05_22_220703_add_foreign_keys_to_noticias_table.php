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
			$table->foreign('id_rally', 'FK_noticias_rallys')->references('id_rally')->on('rallys')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_tipo_noticia', 'FK_noticias_tipo_noticias')->references('id_tipo_noticia')->on('tipos_noticia')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
			$table->dropForeign('FK_noticias_rallys');
			$table->dropForeign('FK_noticias_tipo_noticias');
		});
	}

}
