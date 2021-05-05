<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraToInternships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('internships', function (Blueprint $table) {
            //
            $table->string('cover');
            $table->string('slider_images');
            $table->integer('is_tuijian')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('internships', function (Blueprint $table) {
            $table->string('cover');
            $table->string('slider_images');
            $table->integer('is_tuijian');
        });
    }
}
