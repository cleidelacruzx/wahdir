<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('role_id')->unsigned()->nullable();
            $table->integer('reason_deactivation_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('last_name',50);
            $table->string('first_name',50);
            $table->string('middle_name',50)->nullable();
            $table->string('contact_person',100)->nullable();
            $table->string('suffix_name');
            $table->char('gender',1);
            $table->string('primary_contact',15)->nullable();
            $table->string('secondary_contact',15)->nullable();
            $table->string('email',50)->nullable();
            $table->string('secondary_email',50)->nullable();
            $table->date('birthdate')->nullable();
            $table->date('datehired')->nullable();
            $table->date('dateendcontruct')->nullable();
            $table->string('reasons')->nullable();
            $table->char('is_active',1);
            $table->string('philhealth',20)->nullable();
            $table->string('wahemployeenumber',30)->nullable();
            $table->string('pgtemployeenumber',30)->nullable();
            $table->string('metrobankaccount',30)->nullable();
            $table->string('landbankaccount',30)->nullable();
            $table->string('tin',20)->nullable();
            $table->string('sss',20)->nullable();
            $table->string('pagibighdmf',20)->nullable();
            $table->string('mabuhaymilespal',20)->nullable();
            $table->string('getgocebupac',20)->nullable();
            $table->string('image')->nullable();
            $table->string('mailing_address')->nullable();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('user_role');
            $table->foreign('reason_deactivation_id')->references('id')->on('reason_deactivation');
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
        Schema::table('profiles', function ($table) {
            $table->dropForeign('profiles_role_id_foreign');
            $table->dropForeign('profiles_reason_deactivation_id_foreign');
            $table->dropForeign('profiles_user_id_foreign');
        });
        Schema::drop('profiles');
    }
}
