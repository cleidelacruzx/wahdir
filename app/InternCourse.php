<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternCourse extends Model
{
    protected $table = 'course';
    protected $fillable = ['course'];
    public $timestamps = false;

    public function interns(){
    	return $this->belongsTo('App\Intern');
    }
}
