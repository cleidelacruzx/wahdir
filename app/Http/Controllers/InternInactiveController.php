<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intern;
use App\Http\Requests;
use Session;

class InternInactiveController extends Controller
{
    public function update(Request $request, $id)
    {
        $internInactive = Intern::find($id);

        $internInactive->is_active = $request->input('is_active');

        $internInactive->save();

        if ($request->input('is_active') == 'Y') {
            Session::flash('success','Account has been Activated');
            return redirect()->route('interns.index');
        }else{
            Session::flash('repeat','Account has been Deactivated');
            return redirect()->route('interns.index');
        }
    }
}
