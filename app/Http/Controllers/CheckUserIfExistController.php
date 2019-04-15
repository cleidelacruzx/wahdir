<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class CheckUserIfExistController extends Controller
{
    //
        public function CheckUserIfExist(Request $request)
    {
      $user = User::all()->where('username', Input::get('username'))->first();
      if ($user) {
          return "false";
      } else {
          return "true";
      }
    }  
}
