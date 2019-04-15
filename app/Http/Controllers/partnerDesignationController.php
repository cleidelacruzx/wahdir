<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PartnerDesignation;
use App\Http\Requests;
use Session;

class partnerDesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partnerDesignation = PartnerDesignation::orderBy('id','desc')
                               ->get();
        $count = 1;

        return view('partnerDesignation.index')->with([ 
            'partnerDesig' => $partnerDesignation,
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
        $check_partnerDesig = PartnerDesignation::where('designation','LIKE',$request->input('designation'))
                                  ->get();

        $count = count($check_partnerDesig);

        if($count >= 1){

          Session::flash('repeat','Parnter Designation Already Exist');
          return redirect()->route('partnerDesignation.index');

        }else{

        $partnerdesig = new PartnerDesignation;

        $partnerdesig->designation = $request->input('designation');

        $partnerdesig->save();

        Session::flash('success','New Partner Designation was Successfully Save');

        return redirect()->route('partnerDesignation.index');

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
        $partnerdesig = PartnerDesignation::find($id);

        $partnerdesig->designation = $request->input('designation');

        $partnerdesig->save();

        Session::flash('success','Partner Designation was Successfully Updated');

        return redirect()->route('partnerDesignation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site = PartnerDesignation::find($id);

        $site->delete();

        Session::flash('repeat','Partner Designation was Successfully Deleted');
        return redirect()->route('partnerDesignation.index');
    }
}
