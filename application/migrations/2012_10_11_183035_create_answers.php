<?php

class Create_Answers {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answers', function($table) {
			$table->increments('id');
			$table->text('description');
			$table->integer('status');
			$table->integer('id_question');
			$table->integer('id_member');
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
		Schema::drop('answers');
	}

}