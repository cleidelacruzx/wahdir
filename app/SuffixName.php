<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuffixName extends Model
{
    protected $table = 'suffixes';

    public function partner(){
    	$this->belongsTo('App\Partner');
    }

    public function user(){
    	$this->belongsTo('App\User');
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
