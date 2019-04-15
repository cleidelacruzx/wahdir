<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternSchool;
use App\Http\Requests;
use Session;
class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school = InternSchool::orderBy('id','desc')
                               ->get();

        $count = 1;
        return view('school.index')->with([ 
            'schools' => $school,
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
        $check_school = InternSchool::where('school','LIKE',$request->input('school'))
                                  ->get();

        $count = count($check_school);

        if($count >= 1){

          Session::flash('repeat','School Already Exist');
          return redirect()->route('school.index');

        }else{
        $school = new InternSchool;

        $school->school = $request->input('school');

        $school->save();

        Session::flash('success','New School was Successfully Save');

        return redirect()->route('school.index');
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
        //show data by specified id
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $school = InternSchool::find($id);

        $school->school = $request->input('school');

        $school->save();

        Session::flash('success','School was Successfully Updated');

        return redirect()->route('school.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = InternSchool::find($id);

        $school->delete();

        Session::flash('repeat','School was Successfully Deleted');
        return redirect()->route('school.index');
    }
}
