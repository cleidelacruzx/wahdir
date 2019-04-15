<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternSchool extends Model
{
    protected $table = 'school';
    public $timestamps = false;

    protected $fillable = ['school'];

    public function interns(){
    	return $this->belongsTo('App\Intern');
    }
}
