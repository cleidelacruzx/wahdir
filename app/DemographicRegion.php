<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemographicRegion extends Model
{
   	
   	protected $table='lib_region';

	protected $fillable = [
		'region_code',
		'region_name'
	];
	
	public function site(){
	    return $this->belongsTo('App\Site');
	}
}
