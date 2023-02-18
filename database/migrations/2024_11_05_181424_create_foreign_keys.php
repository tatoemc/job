<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('forms', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
					
		}); 

		

	}

	public function down()
	{
		Schema::table('forms', function(Blueprint $table) {
			$table->dropForeign('forms_user_id_foreign');
			$table->dropForeign('forms_job_id_foreign');
		});
		
		
       
	}
}
