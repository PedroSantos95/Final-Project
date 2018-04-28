<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRallyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rally', function (Blueprint $table) {
            $table->increments('id_rally');
            $table->integer('numero_pecs');
            $table->string('local');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rally');
    }
}
