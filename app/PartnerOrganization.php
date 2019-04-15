<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerOrganization extends Model
{
    protected $table = 'organizations';
    protected $fillable = ['organization'];
    public $timestamps = false;

    public function partner(){
    	$this->belongsTo('App\Partner');
    }

    public function warmleads(){
    	$this->hasOne('App\WarmLeads');
    }
}
