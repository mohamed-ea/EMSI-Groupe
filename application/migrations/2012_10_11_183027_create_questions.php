<?php

class Create_Questions {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function($table) {
			$table->increments('id');
			$table->string('title',256);
			$table->text('description');
			$table->integer('status');
			$table->integer('id_author');
			$table->integer('id_section');
			$table->integer('views');
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
		Schema::drop('questions');
	}

}