<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacto', function(Blueprint $table)
		{
            $table->increments('id');
			$table->string('email', 255);
            $table->string('dirección', 255);
            $table->string('localidad', 255);
            $table->string('url__facebook', 255);
            $table->string('url__behance', 255);
            $table->string('url__vimeo', 255);
            $table->string('url__pinterest', 255);
            $table->string('url__linked_in', 255);
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
		Schema::drop('contacto');
	}

}
