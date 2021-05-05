<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration 
{
	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->index();
            $table->string('cate_name');
            $table->integer('sort')->default(0);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('categories');
	}
}
