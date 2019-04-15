<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Partner;
use App\SuffixName;
use App\UserRole;
use App\PartnerDesignation;
use App\PartnerOrganization;
use Session;
use Image;
// use Storage;
use File;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $suf;

    public function __construct(){

        $this->middleware('auth');

        $suffix = SuffixName::all();
        $this->suf= array();
        foreach ($suffix as $suffixes) {
            $this->suf[$suffixes->suffix_code] = $suffixes->suffix_desc;
        }
    }
    
    public function index(Request $request)
    {
        $partner = Partner::orderBy('id','desc')
                            ->get();

        $no = 1;
        return view('partner.index')->with([ 
            'partner' => $partner,
            'count' => $no,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $facility = FacilityConfig::with('province','municipality','barangay')->first();


        // $provinces = DemographicProvince::select('province_code','province_name')
        //                             ->where('region_code','=',$facility->province->region_code)
        //                             ->get();
        // $prov = array();
        // foreach ($provinces as $province) {
        //     $prov[$province->province_code] = $province->province_name;
        // }

        // $municipalities = DemographicMunicipality::select('muncity_code','muncity_name')
        //                             //SELECT * FROM lib_municipality WHERE province_code = $facility->municipality->province_code
        //                             ->where('province_code','=',$facility->municipality->province_code)
        //                             ->get();
        // $muncity = array();
        // foreach ($municipalities as $municipality) {
        //     $muncity[$municipality->muncity_code] = $municipality->muncity_name;
        // }

        // $barangays = DemographicBarangay::select('brgy_code','brgy_name')
        //                             ->where('muncity_code','=',$facility->barangay->muncity_code)
        //                             ->get();
        // $brgy = array();
        // foreach ($barangays as $barangay) {
        //     $brgy[$barangay->brgy_code] = $barangay->brgy_name;
        // }

        return view('partner.form')->with([ 
            // 'facility' => $facility,
            'suffix' => $this->suf,
            // 'region' => $this->reg,
            // 'province' => $prov,
            // 'muncity' => $muncity,
            // 'brgy' => $brgy,
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
        $check_patient = Partner::where('last_name','LIKE',$request->input('last_name'))
                                  ->where('first_name','LIKE',$request->input('first_name'))
                                  ->where('middle_name','LIKE',$request->input('middle_name'))
                                  ->where('suffix_name','LIKE',$request->input('suffix_name'))
                                  ->where('birthdate','=',$request->input('birthdate'))
                                  ->get();

        $count = count($check_patient);

        if($count >= 1){

          Session::flash('repeat','Record Already Exist');
          return redirect()->route('partner.index');//,$partner->id);

        }else{
                
        $partner = new Partner;

        $partner->desig_id = $request->input('desig_id');
        $partner->org_id = $request->input('org_id');
        $partner->user_id = $request->user()->id;
        $partner->last_name = $request->input('last_name');
        $partner->first_name = $request->input('first_name');
        $partner->middle_name = $request->input('middle_name');
        $partner->suffix_name = $request->input('suffix_name');
        $partner->gender = $request->input('gender');
        $partner->primary_contact = $request->input('primary_contact');
        $partner->secondary_contact = $request->input('secondary_contact');
        $partner->email = $request->input('email');
        $partner->secondary_email = $request->input('secondary_email');
        $partner->birthdate = $request->input('birthdate');
        $partner->is_active = $request->input('is_active','Y');
        $partner->mailing_address = $request->input('mailing_address');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->resize( 800,400 )->save($location);

            $partner->image = $filename;
        }

        $partner->save();

        Session::flash('success','Partner '.$partner->first_name.' was Successfully Save');

        return redirect()->route('partner.index');//,$partner->id);
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
        $partner = Partner::find($id);

        return view('partner.show')->with([
            'partner'=>$partner,
            ]);
    }

    public function partnerProfile($id){
        $partner = Partner::find($id);

        return view('partner.profile')->with([
            'partner'=>$partner,
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

        $editPartner = Partner::find($id);

        $organizations = PartnerOrganization::where('is_active','Y')->get();
        $org = array();
        foreach ($organizations as $organization) {
            $org[$organization->id] = $organization->organization;
        }

        $designations = PartnerDesignation::get();
        $desig = array();
        foreach ($designations as $desiginat) {
            $desig[$desiginat->id] = $desiginat->designation;
        }

        // $data = DemographicProvince::select('province_code','province_name')
        //                             ->where('region_code','=',$editPartner->region_code)
        //                             ->get();
        // $provinces = array();
        // foreach ($data as $province) {
        //     $provinces[$province->province_code] = $province->province_name;
        // }

        // $municipalities = DemographicMunicipality::select('muncity_code','muncity_name')
        //                             //SELECT * FROM lib_municipality WHERE province_code = $facility->municipality->province_code
        //                             ->where('province_code','=',$editPartner->province_code)
        //                             ->get();
        // $muncity = array();
        // foreach ($municipalities as $municipality) {
        //     $muncity[$municipality->muncity_code] = $municipality->muncity_name;
        // }

        // $barangays = DemographicBarangay::select('brgy_code','brgy_name')
        //                             ->where('muncity_code','=',$editPartner->muncity_code)
        //                             ->get();
        // $brgy = array();
        // foreach ($barangays as $barangay) {
        //     $brgy[$barangay->brgy_code] = $barangay->brgy_name;
        // }

        return view('partner.form')->with([
            'partners' => $editPartner,
            'designation' => $desig,
            'suffix' => $this->suf,
            'organization' => $org,
            // 'region' => $this->reg,
            // 'province' => $provinces,
            // 'muncity' => $muncity,
            // 'brgy' => $brgy,
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

        $partner = Partner::find($id);

        $partner->desig_id = $request->input('desig_id');
        $partner->org_id = $request->input('org_id');
        $partner->last_name = $request->input('last_name');
        $partner->first_name = $request->input('first_name');
        $partner->middle_name = $request->input('middle_name');
        $partner->suffix_name = $request->input('suffix_name');
        $partner->gender = $request->input('gender');
        $partner->primary_contact = $request->input('primary_contact');
        $partner->secondary_contact = $request->input('secondary_contact');
        $partner->email = $request->input('email');
        $partner->secondary_email = $request->input('secondary_email');
        $partner->birthdate = $request->input('birthdate');
        $partner->is_active = $request->input('is_active');
        $partner->mailing_address = $request->input('mailing_address');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->resize( 800,400 )->save($location);
            $oldFilename = $partner->image;
            $partner->image = $filename;
            // Storage::delete($oldFilename);
            File::delete(public_path('img/'. $oldFilename));
        }

        $partner->save();

        Session::flash('success','Partner '.$partner->last_name.' was Updated Successfully..!');


        return redirect()->route('partner.index');//,$partner->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Storage::delete($partner->image);
        //File::delete(public_path('img/'. $oldFilename));
    }
}
