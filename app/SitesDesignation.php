<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SitesDesignation extends Model
{
    protected $table = 'sites_designation';
    protected $fillable = ['sites_desc'];
    public $timestamps = false;
    
    public function site(){
    	return $this->belongsTo('App\Site');
    }
}
