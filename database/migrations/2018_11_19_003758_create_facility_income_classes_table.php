<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityIncomeClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_income_classes', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('income_class');
        });

        DB::table('facility_income_classes')
          ->insert([
            ['id' => '1', 'income_class'  => '1st Class City' ],
            ['id' => '2', 'income_class'  => '2nd Class City'],
            ['id' => '3', 'income_class'  => '3rd Class City'],
            ['id' => '4', 'income_class'  => '4th Class City'],
            ['id' => '5', 'income_class'  => '5th Class City'],
            ['id' => '6', 'income_class'  => '6th Class City'],
            ['id' => '7', 'income_class'  => '1st Class Municipality'],
            ['id' => '8', 'income_class'  => '2nd Class Municipality'],
            ['id' => '9', 'income_class'  => '3rd Class Municipality'],
            ['id' => '10','income_class' => '4th Class Municipality'],
            ['id' => '11','income_class' => '5th Class Municipality'],
            ['id' => '12','income_class' => '6th Class Municipality']
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facility_income_classes');
    }
}
