<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityConfig extends Model
{
    protected $table = 'facility';

    protected $fillable = [
		// 'site_id',
    'hfhudcode',
		'region_code',
		'province_code',
		'muncity_code',
		// 'brgy_code'
    ];

   public function region(){
    return $this->hasOne('App\DemographicRegion','region_code','region_code');
    }

  public function province(){
    return $this->belongsTo('App\DemographicProvince','province_code','province_code');
    }

  public function municipality(){
    return $this->hasOne('App\DemographicMunicipality','muncity_code','muncity_code');
    }

  // public function barangay(){
  //   return $this->hasOne('App\DemographicBarangay','brgy_code','brgy_code');
  //   }

  public function facilities(){
    return $this->hasOne('App\Facility','hfhudcode','hfhudcode');
  }  
  
  public function sites(){
    return $this->belongsTo('App\Site');
  }

  public function facilityInfo(){
    return $this->belongsTo('App\FacilityInfo');
  }     
}  
