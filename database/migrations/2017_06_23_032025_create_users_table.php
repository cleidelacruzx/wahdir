<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('suffix_name');
            $table->date('birthdate');
            $table->char('gender',1);
            $table->char('is_admin',1);
            $table->string('username');
            $table->string('password', 60);
            $table->string('email');
            $table->string('mobile_number',11);
            $table->char('is_active',1);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('user_role');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropForeign('users_role_id_foreign');
        });
        Schema::drop('users');
    }
}
