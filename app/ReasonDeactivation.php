<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReasonDeactivation extends Model
{
    protected $table = 'reason_deactivation';

    public function profile(){
    	return $this->belongsTo('App\Profile');
    }
}
