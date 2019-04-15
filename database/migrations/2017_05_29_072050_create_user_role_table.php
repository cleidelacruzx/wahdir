<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_role', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            // $table->char('role_id',15);
            // $table->string('role_name');

            // $table->primary('role_id');

            $table->increments('id');
            $table->string('role_name');
        });

        DB::table('user_role')
        ->insert([
            ['id' => '1',  'role_name' => 'President'],
            ['id' => '2',  'role_name' => 'Vice President'],
            ['id' => '3',  'role_name' => 'Board of Trustee'],
            ['id' => '4',  'role_name' => 'Treasurer/BOT'],
            ['id' => '5',  'role_name' => 'Corporate Secretary'],
            ['id' => '6',  'role_name' => 'Executive Director'],
            ['id' => '7',  'role_name' => 'IT Consultant'],
            ['id' => '8',  'role_name' => 'SP for Advocacy & Operations'],
            ['id' => '9',  'role_name' => 'SP for Digital Health Programs'],
            ['id' => '10', 'role_name' => 'Staff Management Officer'],
            ['id' => '11', 'role_name' => 'Health Program Partner'],
            ['id' => '12', 'role_name' => 'Network & Systems Partner'],
            ['id' => '13', 'role_name' => 'Platform & Innovation Partner'],
            ['id' => '14', 'role_name' => 'Finance Officer'],
            ['id' => '15', 'role_name' => 'Data Protection Officer'],
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('user_role');
    }
}
