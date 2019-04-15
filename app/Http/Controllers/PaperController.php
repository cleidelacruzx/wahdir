<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Http\Requests;
use Session;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paper = Tag::orderBy('id','desc')
                               ->get();
        $count = 1;
        return view('papers.index')->with([ 
            'papers' => $paper,
            'count' => $count
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
        $check_paper = Tag::where('name','LIKE',$request->input('paper'))
                                  ->get();

        $count = count($check_paper);

        if($count >= 1){

          Session::flash('repeat','Paper Already Exist');
          return redirect()->route('papers.index');

        }else{
        $paper = new Tag;

        $paper->name = $request->input('paper');

        $paper->save();

        Session::flash('success','New Paper was Successfully Save');

        return redirect()->route('papers.index');
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
        $paper = Tag::find($id);

        $paper->name = $request->input('name');

        $paper->save();

        Session::flash('success','Paper was Successfully Updated');

        return redirect()->route('papers.index');
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
        $paper = Tag::find($id);

        $paper->delete();

        Session::flash('repeat','School was Successfully Deleted');
        return redirect()->route('papers.index');
    }
}
