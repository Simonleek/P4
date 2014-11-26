<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
public function up() {

    Schema::create('tasks', function($table) {
        $table->increments('id');
        $table->timestamps();
        $table->string('name');
        $table->text('detail');
        $table->boolean('completed');
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users'); 

    });
}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}
