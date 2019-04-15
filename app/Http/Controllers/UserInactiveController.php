<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Session;

class UserInactiveController extends Controller
{
    public function update(Request $request, $id)
    {
        
    	$data = User::find($id);

        $data->is_active = $request->input('is_active');

        $data->save();

        if ($request->input('is_active') == 'Y') {
        	Session::flash('success','Account has been Activated');
            return redirect()->route('users.index');
        }else{
        	Session::flash('repeat','Account has been Deactivated');
            return redirect()->route('users.index');
        }

    }
}
