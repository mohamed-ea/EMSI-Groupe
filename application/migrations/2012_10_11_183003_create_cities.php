<?php

class Create_Cities {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cities', function($table) {
			$table->increments('id');
			$table->string('code');
			$table->string('name');
			$table->integer('id_country');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cities');
	}

}