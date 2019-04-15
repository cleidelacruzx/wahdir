<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('site_id')->unsigned()->nullable();
            $table->integer('system_admin_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('facility_id')->unsigned();
            // $table->char('site',1);
            $table->string('last_name',50);
            $table->string('first_name',50);
            $table->string('middle_name',50);
            $table->char('suffix_name',5);
            $table->char('system_admin',1);
            $table->char('gender',1);
            $table->string('primary_contact',15)->nullable();
            $table->string('secondary_contact',15)->nullable();
            $table->string('email',50)->nullable();
            $table->string('secondary_email',50)->nullable();
            $table->date('birthdate')->nullable();
            $table->char('status');
            $table->text('reasons')->nullable();
            $table->string('image')->nullable();          
            $table->timestamps();
    
            $table->foreign('site_id')->references('id')->on('sites_designation');
            $table->foreign('system_admin_id')->references('id')->on('system_administrator');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('facility_id')->references('id')->on('facility');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sites', function ($table) {
            $table->dropForeign('sites_site_id_foreign');
            $table->dropForeign('sites_system_admin_id_foreign');
            $table->dropForeign('sites_user_id_foreign');
            $table->dropForeign('sites_facility_id_foreign');
        });
        Schema::drop('sites');
    }
}
