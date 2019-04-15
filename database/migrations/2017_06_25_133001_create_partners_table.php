<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('desig_id')->unsigned()->nullable();
            $table->integer('org_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('last_name',50);
            $table->string('first_name',50);
            $table->string('middle_name',50);
            $table->char('suffix_name',5);
            $table->char('gender',1);
            $table->string('primary_contact',15)->nullable();
            $table->string('secondary_contact',15)->nullable();
            $table->string('email',50)->nullable();
            $table->string('secondary_email',50)->nullable();
            $table->date('birthdate')->nullable();
            $table->char('is_active',1);
            $table->string('image')->nullable();
            $table->string('mailing_address')->nullable();
            $table->timestamps();

            $table->foreign('desig_id')->references('id')->on('designations');
            $table->foreign('org_id')->references('id')->on('organizations');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partners', function ($table) {
            $table->dropForeign('partners_desig_id_foreign');
            $table->dropForeign('partners_user_id_foreign');
        });
        Schema::drop('partners');
    }
}
