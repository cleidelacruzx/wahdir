<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intern;
use App\Http\Requests;
use App\InternCourse;
use App\InternSchool;
use App\Tag;
use App\SuffixName;
use Session;
use Image;
use File;

class InternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $suf;
    protected $tags;

    public function __construct(){
        $this->middleware('auth');

        $this->tags = Tag::all();

        $suffix = SuffixName::all();
        $this->suf = array();
        foreach ($suffix as $suffixes) {
            $this->suf[$suffixes->suffix_code] = $suffixes->suffix_desc;
        }

    }
    
    public function index(Request $request)
    {
        $intern = Intern::orderBy('id','desc')
                               ->get();

        $count = 1;
        return view('intern.index')->with([ 
            'interns'=> $intern,
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
        $count = 1;
        return view('intern.form')->with([ 
            'tags' => $this->tags,
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
        $check_intern = Intern::where('last_name','LIKE',$request->input('last_name'))
                              ->where('first_name','LIKE',$request->input('first_name'))
                              ->where('middle_name','LIKE',$request->input('middle_name'))
                              ->where('suffix_name','LIKE',$request->input('suffix_name'))
                              ->where('birthdate','LIKE',$request->input('birthdate'))
                              ->get();

        $count = count($check_intern);

        if($count >= 1){

          Session::flash('repeat','Intern Already Exist');
          return redirect()->route('interns.index');

        }else{
                
        $intern = new Intern;

        $intern->last_name = $request->input('last_name');
        $intern->first_name = $request->input('first_name');
        $intern->middle_name = $request->input('middle_name');
        $intern->suffix_name = $request->input('suffix_name');
        $intern->gender = $request->input('gender');
        $intern->birthdate = $request->input('birthdate');
        $intern->user_id = $request->user()->id;
        $intern->email = $request->input('email');
        $intern->school_id = $request->input('school_id');
        $intern->course_id = $request->input('course_id');
        $intern->primary_contact = $request->input('primary_contact');
        $intern->date_start = $request->input('date_start');
        $intern->date_end = $request->input('date_end');
        $intern->is_active = $request->input('is_active','Y');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($location);

            $intern->image = $filename;
        }


        $intern->save();

        
        if (isset($request->tags)) {
            $intern->tags()->sync($request->input('tags'), false);
        } else {
            $intern->tags()->sync(array());
        }

        Session::flash('success','Intern was Successfully Save');

        return redirect()->route('interns.index');
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
        $tags = Intern::find($id);

        return view('intern.show')->with('tag',$tags);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $internedit = Intern::find($id);

        $tags2 = [];
        foreach ($this->tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        $schools = InternSchool::all();
        $sch = [];
        foreach ($schools as $school) {
            $sch[$school->id] = $school->school;
        }

        $courses = InternCourse::all();
        $cours = [];
        foreach ($courses as $course) {
            $cours[$course->id] = $course->course;
        }

        $count = 1;
        return view('intern.form')->with([
            'count' => $count,
            'intern' => $internedit,
            'courses' => $cours,
            'schools' => $sch,
            'tags' => $tags2,
            'suffix' => $this->suf
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
        $intern = Intern::find($id);

        $intern->last_name = $request->input('last_name');
        $intern->first_name = $request->input('first_name');
        $intern->middle_name = $request->input('middle_name');
        $intern->suffix_name = $request->input('suffix_name');
        $intern->gender = $request->input('gender');
        $intern->birthdate = $request->input('birthdate');
        $intern->email = $request->input('email');
        $intern->school_id = $request->input('school_id');
        $intern->course_id = $request->input('course_id');
        $intern->primary_contact = $request->input('primary_contact');
        $intern->date_start = $request->input('date_start');
        $intern->date_end = $request->input('date_end');
        $intern->is_active = $request->input('is_active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($location);
            $oldFilename = $intern->image;
            $intern->image = $filename;
            File::delete(public_path('img/'. $oldFilename));
        }

        $intern->save();

        if (isset($request->tags)) {
            $intern->tags()->sync($request->tags);
        } else {
            $intern->tags()->sync(array());
        }

        Session::flash('success','Intern was Successfully Updated');

        return redirect()->route('interns.index');
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
