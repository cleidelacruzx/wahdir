<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intern_tag', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('intern_id')->unsigned();
            $table->foreign('intern_id')->references('id')->on('interns');

            $table->integer('tag_id')->unsigned();
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('intern_tag', function ($table) {
            $table->dropForeign('intern_tag_intern_id_foreign');
            $table->dropForeign('intern_tag_tag_id_foreign');
        });
        Schema::drop('intern_tag');
    }
}
