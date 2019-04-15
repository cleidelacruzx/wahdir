<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    /**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $table='lib_facility';

	protected $fillable = [
		'hfhudcode',
		'hfhudname',
		'region_code',
		'province_code',
		'muncity_code',
		'brgy_code',
		'statflag'
	];
}
