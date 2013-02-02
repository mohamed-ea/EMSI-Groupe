<?php

class Create_Countries {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('countries', function($table) {
			$table->increments('id');
			$table->string('name',128);
			$table->string('code', 3);
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('countries');
	}

}