<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityInfo extends Model
{
   	protected $table='facility_infos';

	protected $fillable = [
		'facility_id',
		'incomeclass_id',
		'primary_contact',
		'secondary_contact',
		'email',
		'secondary_email',
		'mayors_name',
		'mho_name',
		'lgu_address',
		'moa_version',
		'pickup_delivery',
		'mailing_address',
		'user_id',
		'is_active'
	];

	public function facilityIncomeClass(){
    	return $this->hasOne('App\FacilityIncomeClass','id','incomeclass_id');
    }

    public function facilityConfig(){
      	return $this->hasOne('App\FacilityConfig','id','facility_id');
      }

    public function user(){
      return $this->hasOne('App\User','id','user_id');
    } 
}
