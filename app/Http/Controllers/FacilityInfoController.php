<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacilityInfo;
use App\FacilityIncomeClass;
use App\FacilityConfig;
use App\Http\Requests;
use Image;
use File;
use Session;

class FacilityInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilityInfo = FacilityInfo::all();

        return view('facilityinfo.index')->with([
            'facility' => $facilityInfo
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facility = FacilityInfo::select('facility_id')->get();
        $info = FacilityConfig::whereNotIn('id',$facility)->get();

        return view('facilityinfo.form')->with([
            'info2' => $info
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
        //
        $count_facility = FacilityInfo::where('facility_id','LIKE',$request->input('facility_id'))
                                  ->get();

        $count = count($count_facility);

        if($count >= 1){

          Session::flash('repeat','Facility Info Already Exist');
          return redirect()->route('facilityinfo.index');

        }else{

        $facility = new FacilityInfo;

        $facility->facility_id = $request->input('facility_id');
        $facility->incomeclass_id = $request->input('incomeclass_id');
        $facility->primary_contact = $request->input('primary_contact');
        $facility->user_id = $request->user()->id;
        $facility->secondary_contact = $request->input('secondary_contact');
        $facility->email = $request->input('email');
        $facility->secondary_email = $request->input('secondary_email');
        $facility->mayors_name = $request->input('mayors_name');
        $facility->mho_name = $request->input('mho_name');
        $facility->lgu_address = $request->input('lgu_address');
        $facility->moa_version = $request->input('moa_version');
        $facility->pickup_delivery = $request->input('pickup_delivery');
        $facility->mailing_address = $request->input('mailing_address');
        $facility->is_active = $request->input('is_active','Y');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($location);

            $facility->image = $filename;
        }

        $facility->save();

        Session::flash('success','Facility Info was Successfully Save');

        return redirect()->route('facilityinfo.index');
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
        $facility = FacilityInfo::find($id);

        return view('facilityinfo.show')->with([
            'fac'=>$facility,
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
        $editFacilityInfo = FacilityInfo::find($id);

        $facility = FacilityIncomeClass::all();

        $inform = array();
        foreach ($facility as $info) {
            $inform[$info->id] = $info->income_class;
        }

        $facilities = FacilityConfig::all();

        $facility2 = array();
        foreach ($facilities as $fac) {
            $facility2[$fac->id] = $fac->facilities->hfhudname;
        }

        return view('facilityinfo.form')->with([
            'facilityInfo' => $editFacilityInfo,
            'income_class' => $inform,
            'facility1' => $facility2
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
        $facility = FacilityInfo::find($id);

        $facility->facility_id = $request->input('facility_id');
        $facility->incomeclass_id = $request->input('incomeclass_id');
        $facility->primary_contact = $request->input('primary_contact');
        $facility->secondary_contact = $request->input('secondary_contact');
        $facility->email = $request->input('email');
        $facility->secondary_email = $request->input('secondary_email');
        $facility->mayors_name = $request->input('mayors_name');
        $facility->mho_name = $request->input('mho_name');
        $facility->lgu_address = $request->input('lgu_address');
        $facility->moa_version = $request->input('moa_version');
        $facility->pickup_delivery = $request->input('pickup_delivery');
        $facility->mailing_address = $request->input('mailing_address');
        $facility->is_active = $request->input('is_active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($location);
            $oldFilename = $facility->image;
            $facility->image = $filename;
            File::delete(public_path('img/'. $oldFilename));
        }

        $facility->save();

        Session::flash('success','Facility Info was Updated Successfully..!');


        return redirect()->route('facilityinfo.index');//,$partner->id);
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
