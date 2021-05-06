<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserExtraToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('add_date')->nullable();
            $table->string('last_login_date')->nullable();
            $table->string('add_ip')->nullable();
            $table->string('login_ip')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('add_date');
            $table->string('last_login_date');
            $table->string('add_ip');
            $table->string('login_ip');
            $table->string('city');
            $table->string('province');
        });
    }
}
