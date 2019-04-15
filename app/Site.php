<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'sites';

    protected $fillable = [
		'site_id',
		'last_name',
		'first_name',
		'middle_name',
		'suffix_name',
		'gender',
		'primary_contact',
		'secondary_contact',
		'email',
		'secondary_email',
		'birthdate',
		'site',
		'status',
		'user_id',
		'system_admin_id',
		'facility_id'
    ];

      public function user(){
      	return $this->hasOne('App\User','id','user_id');
      } 

      public function siteSuffix(){
      	return $this->hasOne('App\SuffixName','suffix_code','suffix_name');
      }

      public function designations(){
      	return $this->hasOne('App\SitesDesignation','id','site_id');
      }

      public function systemAdmin(){
      	return $this->hasOne('App\SitePersonnelSystemAdministrator','id','system_admin_id');
      }

      public function facilityConfig(){
      	return $this->hasOne('App\FacilityConfig','id','facility_id');
      }
}
