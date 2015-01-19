<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFitnessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fitness_card', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('fitness_center');
			$table->integer('max_visits');
			$table->integer('times_visited');
			$table->timestamp('expire_date');
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
		Schema::drop('fitness_card');
	}

}
