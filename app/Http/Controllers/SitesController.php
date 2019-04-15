<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuffixName;
use App\Site;
use App\SitePersonnelSystemAdministrator;
use App\SitesDesignation;
use App\Facility;
use App\FacilityConfig;
use App\Http\Requests;
use Session;
use Image;
use File;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $suf;
    // protected $reg;

    public function __construct(){
        $this->middleware('auth');

        $suffix = SuffixName::all();
        $this->suf = array();
        foreach ($suffix as $suffixes) {
            $this->suf[$suffixes->suffix_code] = $suffixes->suffix_desc;
        }
    }

    public function index(Request $request)
    {        

        $site = Site::
                      // where('status', '=', 'Y')
                      orderBy('id')
                      ->get();

        $count = 1;
        return view('sites.index')->with([
            'sites' => $site,
            'count' => $count,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        
        return view('sites.form')->with([
            'suffix' => $this->suf
            ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check_site = Site::where('last_name','LIKE',$request->input('last_name'))
                          ->where('first_name','LIKE',$request->input('first_name'))
                          ->where('middle_name','LIKE',$request->input('middle_name'))
                          ->where('suffix_name','LIKE',$request->input('suffix_name'))
                          ->where('birthdate','=',$request->input('birthdate'))
                          ->get();

        $count = count($check_site);

        if($count >= 1){

          Session::flash('repeat','Site sites Already Exist');
          return redirect()->route('sites.index');

        }else{
                
        $sites = new Site;

        $sites->last_name = $request->input('last_name');
        $sites->first_name = $request->input('first_name');
        $sites->middle_name = $request->input('middle_name');
        $sites->suffix_name = $request->input('suffix_name');
        $sites->site_id = $request->input('site_id');
        $sites->facility_id = $request->input('facility_id');
        $sites->user_id = $request->user()->id;
        $sites->system_admin_id = $request->input('system_admin_id');
        $sites->status = $request->input('status');
        $sites->gender = $request->input('gender');
        $sites->primary_contact = $request->input('primary_contact');
        $sites->secondary_contact = $request->input('secondary_contact');
        $sites->email = $request->input('email');
        $sites->secondary_email = $request->input('secondary_email');
        $sites->birthdate = $request->input('birthdate');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($location);

            $sites->image = $filename;
        }

        $sites->save();

        Session::flash('success','New Personnel was Successfully Save');

        // if ($request->input('status') == 'N') {
        //   return redirect()->route('warmleads.index');
        // }else{
        //   return redirect()->route('sites.index');
        // }
        return redirect()->route('sites.index');
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
        $sites = Site::find($id);

        return view('sites.show')->with([
            'sites'=>$sites,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editSites = Site::find($id);
        
        $siteDesignations = SitesDesignation::get();
        $siteDesig = array();
        foreach ($siteDesignations as $siteDesignation) {
            $siteDesig[$siteDesignation->id] = $siteDesignation->sites_desc;
        }

        $system_admin_id = SitePersonnelSystemAdministrator::get();
        $admins = array();
        foreach ($system_admin_id as $systemadmin) {
            $admins[$systemadmin->id] = $systemadmin->functions;
        }

        $facilities = FacilityConfig::all();
        $fac = array();
        foreach ($facilities as $facility) {
            $fac[$facility->id] = $facility->facilities->hfhudname;
        }


        return view('sites.form')->with([
            'sites' => $editSites,
            'suffix' => $this->suf,
            'admin' => $admins,
            'siteDesignation' => $siteDesig,
            'fac' => $fac,
          ]);
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


        $sites = Site::find($id);

        $sites->last_name = $request->input('last_name');
        $sites->first_name = $request->input('first_name');
        $sites->middle_name = $request->input('middle_name');
        $sites->suffix_name = $request->input('suffix_name');
        $sites->site_id = $request->input('site_id');
        $sites->facility_id = $request->input('facility_id');
        $sites->system_admin_id = $request->input('system_admin_id');
        $sites->status = $request->input('status');
        $sites->gender = $request->input('gender');
        $sites->primary_contact = $request->input('primary_contact');
        $sites->secondary_contact = $request->input('secondary_contact');
        $sites->email = $request->input('email');
        $sites->secondary_email = $request->input('secondary_email');
        $sites->birthdate = $request->input('birthdate');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($location);
            $oldFilename = $sites->image;
            $sites->image = $filename;
            File::delete(public_path('img/'. $oldFilename));
        }

        $sites->save();

        Session::flash('success','Site Personnel was Updated Successfully..!');

        // if ($request->input('status') == 'N') {
        //   return redirect()->route('warmleads.index');
        // }else{
        //   return redirect()->route('sites.index');
        // }
        return redirect()->route('sites.index');
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
    }
}
