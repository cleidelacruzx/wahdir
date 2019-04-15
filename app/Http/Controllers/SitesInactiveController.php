<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Http\Requests;
use Session;

class SitesInactiveController extends Controller
{
    public function update(Request $request, $id)
    {
        
    	$data = Site::find($id);

        $data->status = $request->input('status');
        $data->reasons = $request->input('reasons');

        $data->save();

        if ($request->input('status') == 'Y') {
        	Session::flash('success','Account has been Activated');
            // return redirect()->route('sites.index');
        }else{
        	Session::flash('repeat','Account has been Deactivated');
            // return redirect()->route('warmleads.index');
            // return redirect()->route('sites.index');
        }
        return redirect()->route('sites.index');

    }
}
