<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityIncomeClass extends Model
{
    protected $table = 'facility_income_classes';
    protected $fillable = ['income_class'];
    public $timestamps = false;

    public function facilityInfo(){
    	return $this->belongsTo('App\FacilityInfo');
    }
}
