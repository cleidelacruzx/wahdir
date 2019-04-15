<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemographicBarangay extends Model
{
    //
    protected $table='lib_brgy';

	protected $fillable = [
		'region_code',
		'province_code',
		'muncity_code',
		'brgy_code',
		'brgy_name'
	];
}
