<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use App\PartnerOrganization;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Session;

class PartnerInactiveController extends Controller
{
    public function update(Request $request, $id)
    {

        $data = Partner::find($id);

        $data->is_active = $request->input('is_active');

        $data->save();

        if ($request->input('is_active') == 'Y') {
            Session::flash('success','Partner has been Activated');
            return redirect()->route('partner.index');
        }else{
            Session::flash('repeat','Partner has been Deactivated');
            return redirect()->route('partner.index');
        }
       
    }
}
