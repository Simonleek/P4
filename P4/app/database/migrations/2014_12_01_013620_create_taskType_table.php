<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasktypes', function($table) {
        $table->increments('id');
        $table->timestamps();
        $table->string('name');
        });
        Schema::table('tasks',function($table) {
        $table->integer('type_id')->unsigned();
        $table->foreign('type_id')->references('id')->on('tasktypes'); 
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasktypes');
		Schema::table('tasks', function($table) {
    	$table->dropColumn('type_id');
		});
	}

}
