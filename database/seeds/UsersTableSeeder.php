<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	   	//DB::table('user')->delete();

	    //Default Admin User for Initial Login
	    $users = array(
	            ['last_name' => 'Padilla', 'first_name' => 'Remar', 'middle_name' => 'Mecina', 'birthdate' => '1993-12-17', 'gender' => 'M', 'role_id' => '1', 
	            'is_admin' => 'Y', 'username' => 'user', 'email' => 'user@wah.ph', 'mobile_number' => '0917343117', 'is_active' => 'Y',
				'password' => Hash::make('user')],
	    );
	        
	    foreach ($users as $user)
	    {
	        User::create($user);
	    }  
    }
}
