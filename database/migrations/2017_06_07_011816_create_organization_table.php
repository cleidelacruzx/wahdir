<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('organization');
            $table->char('is_active',1);

        });

        DB::table('organizations')
        ->insert([
          ['id' => '1', 'organization' => 'QualComm Wireless Reach' , 'is_active' => 'Y'],
          ['id' => '2', 'organization' => 'United States Agency for International Development','is_active' => 'Y'],
          ['id' => '3', 'organization' => 'Wireless Access for Health/Tarlac Provincial Health Office','is_active' => 'Y'],
          ['id' => '4', 'organization' => 'Provincial Government of Tarlac','is_active' => 'Y'],
          ['id' => '5', 'organization' => 'CHD-CAR','is_active' => 'Y'],
          ['id' => '6', 'organization' => 'Department of Health','is_active' => 'Y'],
          ['id' => '7', 'organization' => 'CBO - MITD','is_active' => 'Y'],
          ['id' => '8', 'organization' => 'LH','is_active' => 'Y']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('organizations');
    }
}
