<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    protected $table = 'interns';

    protected $fillable = [
        'id',
        'last_name',
        'first_name',
        'middle_name',
        'course_id',
        'school_id',
        'primary_contact',
        'email',
        'date_start',
        'date_end',
        'user_id'
    ];

    public function user(){
      return $this->hasOne('App\User','id','user_id');
    } 

    public function courses(){
    	return $this->hasOne('App\InternCourse','id','course_id');
    }
    
    public function schools(){
    	return $this->hasOne('App\InternSchool','id','school_id');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }

    public function internSuffix(){
      return $this->hasOne('App\SuffixName','suffix_code','suffix_name');
    }
}
