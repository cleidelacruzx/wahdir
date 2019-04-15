<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemographicMunicipality extends Model
{	
    protected $table='lib_muncity';

	protected $fillable = [
		'region_code',
		'province_code',
		'muncity_code',
		'muncity_name'
	];

	public function site(){
	    return $this->belongsTo('App\Site');
	}
}

