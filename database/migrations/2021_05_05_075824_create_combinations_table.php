<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombinationsTable extends Migration 
{
	public function up()
	{
		Schema::create('combinations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('internship_id')->unsigned()->index();
            $table->integer('cycle_id')->unsigned()->index();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('combinations');
	}
}
