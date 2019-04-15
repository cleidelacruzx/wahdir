<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('designation');

        });

        DB::table('designations')
        ->insert([
          ['id' => '1', 'designation' => 'Program Manager'],
          ['id' => '2', 'designation' => 'Chief-of-Party'],
          ['id' => '3', 'designation' => 'Senior Technical Advisor'],
          ['id' => '4', 'designation' => 'Electronic/Medical-Health Specialist'],
          ['id' => '5', 'designation' => 'Project Assistant'],
          ['id' => '6', 'designation' => 'Technical Officer'],
          ['id' => '7', 'designation' => 'Technical Coordinator'],
          ['id' => '8', 'designation' => 'Health Program Coordinator'],
          ['id' => '9', 'designation' => 'Vice President'],
          ['id' => '10','designation' => 'IT Consultant'],
          ['id' => '11','designation' => 'Statistician I'],
          ['id' => '12','designation' => 'Statistician II'],
          ['id' => '13','designation' => 'Admin Assistant I'],
          ['id' => '14','designation' => 'Job Order'],
          ['id' => '15','designation' => 'ISA III'],
          ['id' => '16','designation' => 'CO I'],
          ['id' => '17','designation' => 'Senior Technical Advisor']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('designations');
    }
}
