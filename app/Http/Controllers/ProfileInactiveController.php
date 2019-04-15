<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Http\Requests;
use Session;

class ProfileInactiveController extends Controller
{
    public function update(Request $request, $id)
    {
        $data = Profile::find($id);

        $data->is_active = $request->input('is_active');
        $data->dateendcontruct = $request->input('dateendcontruct');
        $data->reason_deactivation_id = $request->input('reason_deactivation_id');

        $data->save();

        if ($request->input('is_active') == 'Y') {
            Session::flash('success','Account has been Activated');
            return redirect()->route('profile.index');
        }else{
            Session::flash('repeat','Account has been Deactivated');
            return redirect()->route('profile.index');
        }
    }
}
