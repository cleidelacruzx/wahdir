<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table='user_role';

    public $timestamps = false;
	protected $fillable = ['role_name'];

    public function user(){
    	$this->belongsTo('App\User');
    }

    public function profile(){
    	$this->belongsTo('App\Profile');
    }
}
