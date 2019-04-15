<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacilityConfig;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;

class FacilityConfigInactiveController extends Controller
{
    //
        public function update(Request $request, $id)
    {
    	$data = FacilityConfig::find($id);

        $data->is_active = $request->input('is_active');
        $data->deactivation_date = $request->input('deactivation_date');
        $data->remarks = $request->input('remarks');

        $data->save();

        DB::table('sites')
        ->where('status','=',$request->input('is_active') == 'N' ? 'Y' : 'N')
        ->where('facility_id','=',$id)
        ->update([
            'status' => $request->input('is_active') == 'Y' ? 'Y' : 'N' 
            ]);

        if ($request->input('is_active') == 'Y') {
            Session::flash('success','Account has been Activated and Sites Personnel also Activated');
            return redirect()->route('facility.index');
        }else{
            Session::flash('repeat','Account has been Deactivated and Sites Personnel also Deactivated');
            return redirect()->route('facility.index');
        }
    }    
}
