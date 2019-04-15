<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DemographicRegion;
use App\DemographicProvince;
use App\DemographicMunicipality;
use App\DemographicBarangay;
use App\FacilityConfig;
use App\Http\Requests;
use App\Facility;
use Session;
use Illuminate\Support\Facades\DB;
use Response;

class FacilityConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $region;

    public function __construct(){
        $this->middleware('auth');

        $this->region = DemographicRegion::all();
    }

    public function index(Request $request)
    {
      $faciliyConfig = FacilityConfig::all();

      return view('facility.index')->with([
        'facilities' => $faciliyConfig
        ]);
    }

    public function getProvinceList(Request $request)
    {
        $province = DemographicProvince::
                      select('province_name','province_code')
                    ->where("region_code",'LIKE','%'.$request->input('region_id').'%')
                    ->pluck("province_name","province_code");
        return $province;
    }

    public function getMuncityList(Request $request)
    {
        $muncity = DemographicMunicipality::
                      select('muncity_name','muncity_code')
                    ->where('province_code','LIKE','%'.$request->input('province_id').'%')
                    ->pluck("muncity_name","muncity_code");
        return $muncity;
    }

        public function gethfhudcodeList(Request $request)
    {
        $hfhudcode = Facility::
                    select('hfhudname','hfhudcode')
                    ->where('muncity_code','LIKE','%'.$request->input('muncity_id').'%')
                    ->pluck("hfhudname","hfhudcode");
        return $hfhudcode;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facility.form')->with([
            'region' => $this->region
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

        $count_facility = FacilityConfig::where('region_code','LIKE',$request->input('region_code'))
                                  ->where('province_code','LIKE',$request->input('province_code'))
                                  ->where('hfhudcode','=',$request->input('hfhudcode'))
                                  ->get();

        $count = count($count_facility);

        if($count >= 1){

          Session::flash('repeat','Facility Already Exist');
          return redirect()->route('facility.index');

        }else{

        $facility = new FacilityConfig;

        $facility->region_code = $request->input('region_code');
        $facility->province_code = $request->input('province_code');
        $facility->muncity_code = $request->input('muncity_code');
        $facility->hfhudcode = $request->input('hfhudcode');
        $facility->is_active = $request->input('is_active','Y');

        $facility->save();

        Session::flash('success','Facility was Successfully Save');

        return redirect()->route('facility.index');
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
        $editFacilityConfig = FacilityConfig::find($id);

        $reg = array();
        foreach ($this->region as $region) {
            $reg[$region->region_code] = $region->region_name;
        }

        $data = DemographicProvince::select('province_code','province_name')
                                    ->where('region_code','=',$editFacilityConfig->region_code)
                                    ->get();
        $provinces = array();
        foreach ($data as $province) {
            $provinces[$province->province_code] = $province->province_name;
        }

        $municipalities = DemographicMunicipality::select('muncity_code','muncity_name')
                                    //SELECT * FROM lib_municipality WHERE province_code = $facility->municipality->province_code
                                    ->where('province_code','=',$editFacilityConfig->province_code)
                                    ->get();
        $muncity = array();
        foreach ($municipalities as $municipality) {
            $muncity[$municipality->muncity_code] = $municipality->muncity_name;
        }

        $facilities = Facility::select('hfhudcode','hfhudname')
                                    ->where('muncity_code','=',$editFacilityConfig->muncity_code)
                                    ->get();

        $fac = array();
        foreach ($facilities as $facility) {
            $fac[$facility->hfhudcode] = $facility->hfhudname;
        }

        return view('facility.form')->with([
        'facility' =>  $editFacilityConfig,
        'fac' => $fac, 
        'region' => $reg,
        'province' => $provinces,
        'muncity' => $muncity,
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
        //
        $facility = FacilityConfig::find($id);

        $facility->region_code = $request->input('region_code');
        $facility->province_code = $request->input('province_code');
        $facility->muncity_code = $request->input('muncity_code');
        $facility->hfhudcode = $request->input('hfhudcode');
        $facility->is_active = $request->input('is_active');

        $facility->save();

        Session::flash('success','Facility was Successfully Updated');

        return redirect()->route('facility.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = FacilityConfig::find($id);

        $facility->delete();

        Session::flash('repeat','Record was Successfully Deleted');
        return redirect()->route('facility.index');
    }
}
