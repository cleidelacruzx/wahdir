<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SitesDesignation;
use App\Http\Requests;
use Session;

class siteDesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sitesDesig = SitesDesignation::orderBy('id','desc')
                               ->get();
        $count = 1;

        return view('siteDesignation.index')->with([ 
            'sitesDesig' => $sitesDesig,
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
        $check_siteDesig = SitesDesignation::where('sites_desc','LIKE',$request->input('sites_desc'))
                                  ->get();

        $count = count($check_siteDesig);

        if($count >= 1){

          Session::flash('repeat','Site Designation Already Exist');
          return redirect()->route('siteDesignation.index');

        }else{

        $site = new SitesDesignation;

        $site->sites_desc = $request->input('sites_desc');

        $site->save();

        Session::flash('success','New Site Designation was Successfully Save');

        return redirect()->route('siteDesignation.index');

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
        $site = SitesDesignation::find($id);

        $site->sites_desc = $request->input('sites_desc');

        $site->save();

        Session::flash('success','Site Designation was Successfully Updated');

        return redirect()->route('siteDesignation.index');
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
        $site = SitesDesignation::find($id);

        $site->delete();

        Session::flash('repeat','Site Designation was Successfully Deleted');
        return redirect()->route('siteDesignation.index');
    }
}
