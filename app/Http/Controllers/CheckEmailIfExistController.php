<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class CheckEmailIfExistController extends Controller
{
    //
        public function CheckEmailIfExist(Request $request)
    {
      $email = User::all()->where('email', Input::get('email'))->first();
      if ($email) {
          return "false";
      } else {
          return "true";
      }
    }  
}
