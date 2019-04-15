<?php

use Illuminate\Database\Seeder;
use App\FacilityConfig;

class FacilityTableSeederDefaultValue extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       	//Default Admin Facility Config Setting
	    $facility = array(
	            [
	            'region_code' => '03',
	            'province_code' => '0369',
	            'muncity_code' => '036916',
	            // 'brgy_code' => '036916075',
	            'hfhudcode'=> 'DOH000000000028933',
	            'is_active' => 'Y'
				],
	    );
	        
	    foreach ($facility as $fac)
	    {
	        FacilityConfig::create($fac);
	    } 
    }
}
