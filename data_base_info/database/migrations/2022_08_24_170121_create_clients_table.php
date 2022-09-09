<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('phone');
			$table->string('email');
			$table->integer('blood_type_id')->unsigned();
			$table->string('password');
			$table->date('date_of_birth');
			$table->date('last_donation_date');
			$table->string('name');
			$table->integer('pin_code');
			$table->integer('city_id')->unsigned();
			$table->string('api_tokem', 60);
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}