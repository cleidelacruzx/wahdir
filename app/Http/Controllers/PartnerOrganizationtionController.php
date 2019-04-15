<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PartnerOrganization;
use App\Http\Requests;
use Session;

class PartnerOrganizationtionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partnerOrganization = PartnerOrganization::orderBy('id','desc')
                               ->get();
        $count = 1;

        return view('partnerOrganization.index')->with([ 
            'partnerOrg' => $partnerOrganization,
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
        $check_partnerOrg = PartnerOrganization::where('organization','LIKE',$request->input('organization'))
                                  ->get();

        $count = count($check_partnerOrg);

        if($count >= 1){

          Session::flash('repeat','Partner Organization Already Exist');
          return redirect()->route('partnerDesignation.index');

        }else{

        $partnerorg = new PartnerOrganization;

        $partnerorg->organization = $request->input('organization');
        $partnerorg->is_active = $request->input('is_active','Y');

        $partnerorg->save();

        Session::flash('success','New Partner Organization was Successfully Save');

        return redirect()->route('partnerOrganization.index');

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
        $partnerorg = PartnerOrganization::find($id);

        $partnerorg->organization = $request->input('organization');
        $partnerorg->is_active = $request->input('is_active');

        $partnerorg->save();

        Session::flash('success','Partner Organization was Successfully Updated');

        return redirect()->route('partnerOrganization.index');
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
        $partnerorg = PartnerOrganization::find($id);

        $partnerorg->delete();

        Session::flash('repeat','Partner Organization was Successfully Deleted');
        return redirect()->route('partnerOrganization.index');
    }
}
