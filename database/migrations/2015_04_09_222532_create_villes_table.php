<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVillesTable extends Migration {

	public function up()
	{
		Schema::create('villes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom', 255);
			$table->string('wilaya', 255);
			$table->float('longitude', 14,11);
			$table->float('latitude', 14,11);
		});
	}

	public function down()
	{
		Schema::drop('villes');
	}
}