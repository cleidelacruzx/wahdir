<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('school');
        });

        DB::table('school')
          ->insert([
            ['id' => '1', 'school' => 'Tarlac State University'],
            ['id' => '2', 'school' => 'Tarlac Agricultural University'],
            ['id' => '3', 'school' => 'AMA Computer College'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('school');
    }
}
