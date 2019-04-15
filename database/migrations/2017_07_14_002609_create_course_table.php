<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('course');
        });

        DB::table('course')
          ->insert([
            ['id' => '1', 'course' => 'Bachelor of Science in Information System' ],
            ['id' => '2', 'course' => 'Bachelor of Science in Information Technology'],
            ['id' => '3', 'course' => 'Bachelor of Science in Computer Science']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('course');
    }
}
