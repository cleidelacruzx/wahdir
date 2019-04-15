<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interns', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('course_id')->unsigned()->nullable();
            $table->integer('school_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->char('suffix_name',5);
            $table->string('primary_contact',15);
            $table->string('email',50)->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->char('gender',1);
            $table->date('birthdate')->nullable();
            $table->char('is_active',1);
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('course');
            $table->foreign('school_id')->references('id')->on('school');
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
        Schema::table('interns', function ($table) {
            $table->dropForeign('interns_course_id_foreign');
            $table->dropForeign('interns_school_id_foreign');
            $table->dropForeign('interns_user_id_foreign');
        });
        Schema::drop('interns');
    }
}
