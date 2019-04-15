<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserRole;
use App\Http\Requests;
use Session;

class UserDesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userRoles = UserRole::orderBy('id','desc')
                               ->get();
        $count = 1;

        return view('userDesignation.index')->with([ 
            'userRole' => $userRoles,
            'count' => $count,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //post to database
        $check_userRole = UserRole::where('role_name','LIKE',$request->input('role_name'))
                                  ->get();

        $count = count($check_userRole);

        if($count >= 1){

          Session::flash('repeat','User Role Already Exist');
          return redirect()->route('userDesignation.index');

        }else{

        $UserRole = new UserRole;

        $UserRole->role_name = $request->input('role_name');

        $UserRole->save();

        Session::flash('success','New Course was Successfully Save');

        return redirect()->route('userDesignation.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $UserRole = UserRole::find($id);

        $UserRole->role_name = $request->input('role_name');

        $UserRole->save();

        Session::flash('success','User Role was Successfully Updated');

        return redirect()->route('userDesignation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $UserRole = UserRole::find($id);

        $UserRole->delete();

        Session::flash('repeat','User Role was Successfully Deleted');
        return redirect()->route('userDesignation.index');
    }
}
