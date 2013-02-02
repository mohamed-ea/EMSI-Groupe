<?php

class Create_Sections {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sections', function($table) {
			$table->increments('id');
			$table->string('title');
			$table->integer('id_section');
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
		SChema::drop('sections');
	}

}