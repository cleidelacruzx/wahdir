<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemAdministratorLegends extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_administrator', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('functions');
        });

        DB::table('system_administrator')
          ->insert([
            ['id' => '1', 'functions' => 'System Administrator (Supervisory)' ],
            ['id' => '2', 'functions' => 'System Administrator (Reports Officer)'],
            ['id' => '3', 'functions' => 'System Administrator (Data Quality Check)'],
            ['id' => '4', 'functions' => 'System Administrator (Technical Officer)']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('system_administrator');
    }
}
