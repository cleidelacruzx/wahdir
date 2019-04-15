<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SitePersonnelSystemAdministrator extends Model
{
    protected $table = 'system_administrator';

    public function site(){
    	return $this->belongsTo('App\Site');
    }
}
