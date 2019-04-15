<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserRole;
use App\SuffixName;
use App\Http\Requests;
use Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $suf;

    public function __construct(){
        $this->middleware('auth');

        $suffix = SuffixName::get();
        $this->suf = array();
        foreach ($suffix as $suffixes) {
            $this->suf[$suffixes->suffix_code] = $suffixes->suffix_desc;
        }
    }

    public function index(Request $request)
    {

        $users = User::orderBy('id','desc')
                               ->get();

        $no = 1;
        return view('users.index')->with([
            'users'=>$users,
            'count'=>$no,
            ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.form')->with([
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
        $check_user = User::where('username','LIKE',$request->input('username'))
                                  ->get();

        $count = count($check_user);

        if($count >= 1){

          Session::flash('repeat','Username Already Exist');

          return redirect()->route('users.index');//,$partner->id);

        }else{
        $user = new User;

        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->suffix_name = $request->input('suffix_name');
        $user->birthdate = $request->input('birthdate');
        $user->gender = $request->input('gender');
        $user->mobile_number = $request->input('mobile_number');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->is_admin = $request->input('is_admin');
        $user->is_active = $request->input('is_active','Y');

        $user->save();

        Session::flash('success','New User was Successfully Save..!');

        return redirect()->route('users.index');
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
        $user = User::find($id);

        $roles = UserRole::all();
        $role = array();
        foreach ($roles as $rol) {
            $role[$rol->id] = $rol->role_name;
        }

        return view('users.form')->with([
            'user' => $user,
            'suffix' => $this->suf,
            'role'=>$role
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
        $user = User::find($id);

        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->suffix_name = $request->input('suffix_name');
        $user->birthdate = $request->input('birthdate');
        $user->gender = $request->input('gender');
        $user->mobile_number = $request->input('mobile_number');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->is_admin = $request->input('is_admin');
        $user->is_active = $request->input('is_active');

        $user->save();
        
        Session::flash('success','User ' .$user->last_name. ' was Updated Successfully..!');

        return redirect()->route('users.index');
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
