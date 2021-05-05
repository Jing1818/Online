<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternshipsTable extends Migration 
{
	public function up()
	{
		Schema::create('internships', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('desc');
            $table->text('content');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('internships');
	}
}
