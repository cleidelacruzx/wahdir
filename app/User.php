<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';

    protected $fillable = [
        'last_name', 'first_name', 'middle_name', 'birthdate', 'gender', 'role_id', 'is_admin', 
        'username', 'email', 'mobile_number', 'is_active'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function userRole(){
      return $this->hasOne('App\UserRole','id','role_id');
    }

    public function partner(){
        $this->belongsTo('App\Partner');
    }
    public function profile(){
        $this->belongsTo('App\Profile');
    }
    public function sites(){
        $this->belongsTo('App\Site');
    }
    public function interns(){
        $this->belongsTo('App\Intern');
    }
}
