<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_infos', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('facility_id')->unsigned();
            $table->integer('incomeclass_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('primary_contact',15)->nullable();
            $table->string('secondary_contact',15)->nullable();
            $table->string('email',50)->nullable();
            $table->string('secondary_email',50)->nullable();
            $table->string('mayors_name',50)->nullable();
            $table->string('mho_name',50)->nullable();
            $table->string('lgu_address')->nullable();
            $table->string('moa_version')->nullable();
            $table->boolean('pickup_delivery')->default(false)->nullable();
            $table->string('mailing_address')->nullable();
            $table->string('image')->nullable();
            $table->char('is_active');

            $table->foreign('facility_id')->references('id')->on('facility');
            $table->foreign('incomeclass_id')->references('id')->on('facility_income_classes');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facility_infos', function ($table) {
            $table->dropForeign('facility_infos_facility_id_foreign');
            $table->dropForeign('facility_infos_incomeclass_id_foreign');
            $table->dropForeign('facility_infos_user_id_foreign');
        });
        Schema::drop('facility_infos');
    }
}
