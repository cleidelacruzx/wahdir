<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('name');
        });

        DB::table('tags')
          ->insert([
            ['id' => '1', 'name' => 'Endorse Letter'],
            ['id' => '2', 'name' => 'Application Letter'],
            ['id' => '3', 'name' => 'Training Agreement'],
            ['id' => '4', 'name' => 'Waiver'],
            ['id' => '5', 'name' => 'Medical Certificate'],
            ['id' => '6', 'name' => 'MOA'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tags');
    }
}
