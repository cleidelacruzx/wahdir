<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReasonsDeactivationProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reason_deactivation', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('reasons');
        });

        DB::table('reason_deactivation')
          ->insert([
            ['id' => '1', 'reasons' => 'END OF CONTRUCT' ],
            ['id' => '2', 'reasons' => 'TERMINATED'],
            ['id' => '3', 'reasons' => 'RESIGN'],
            ['id' => '4', 'reasons' => 'AWAOL']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reason_deactivation');
    }
}
