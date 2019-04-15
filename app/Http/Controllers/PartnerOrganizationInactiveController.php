<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PartnerOrganization;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Session;

class PartnerOrganizationInactiveController extends Controller
{
    public function update(Request $request, $id)
    {
    	$data = PartnerOrganization::find($id);

        $data->is_active = $request->input('is_active');

        $data->save();

        DB::table('partners')
        ->where('is_active','=',$request->input('is_active') == 'N' ? 'Y' : 'N')
        ->where('org_id','=',$id)
        ->update([
            'is_active' => $request->input('is_active') == 'Y' ? 'Y' : 'N' 
            ]);

        if ($request->input('is_active') == 'Y') {
            Session::flash('success','Account has been Activated and Partner also Activated');
            return redirect()->route('partnerOrganization.index');
        }else{
            Session::flash('repeat','Account has been Deactivated and Partner also Deacctivated');
            return redirect()->route('partnerOrganization.index');
        }
    }
}
