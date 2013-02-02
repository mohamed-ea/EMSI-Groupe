<?php

class Create_Members {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function($table) {
			$table->increments('id');
			$table->string('email',64);
			$table->string('psw',64);
			$table->string('name', 128);
			$table->integer('id_city');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('members');
	}

}