<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration 
{
	public function up()
	{
		Schema::create('stages', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('internship_id')->unsigned()->index();
            $table->string('title');
            $table->string('stage_goal');
            $table->integer('day_sign')->default(1);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('stages');
	}
}
