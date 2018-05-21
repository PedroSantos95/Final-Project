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
			$table->increments('id');
			$table->string('nome', 100);
			$table->string('path_white', 100);
			$table->string('path_black', 100);
		});

        DB::table('tipos_noticia')->insert(
            array(
                'nome' => 'Notícias',
                'path_white' => 'news_white.png',
                'path_black' => 'news_black.png'
            )
        );

        DB::table('tipos_noticia')->insert(
            array(
                'nome' => 'Acidente',
                'path_white' => 'crash_white.png',
                'path_black' => 'crash_black.png'
            )
        );

        DB::table('tipos_noticia')->insert(
            array(
                'nome' => 'Tempo',
                'path_white' => 'time_white.png',
                'path_black' => 'time_black.png'
            )
        );

        DB::table('tipos_noticia')->insert(
            array(
                'nome' => 'Informação',
                'path_white' => 'info_white.png',
                'path_black' => 'info_black.png'
            )
        );
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
