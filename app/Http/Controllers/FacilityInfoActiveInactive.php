<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacilityInfo;
use App\Http\Requests;
use Session;


class FacilityInfoActiveInactive extends Controller
{
    public function update(Request $request, $id)
    {
        $facilityInfoInactive = FacilityInfo::find($id);

        $facilityInfoInactive->is_active = $request->input('is_active');

        $facilityInfoInactive->save();

        if ($request->input('is_active') == 'Y') {
            Session::flash('success','Account has been Activated');
            return redirect()->route('facilityinfo.index');
        }else{
            Session::flash('repeat','Account has been Deactivated');
            return redirect()->route('facilityinfo.index');
        }
    }    
}
