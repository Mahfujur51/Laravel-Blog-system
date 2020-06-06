<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use App\Profile;

class UserController extends Controller
{
    public function __construct(){

    $this->middleware('admin');

    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users=User::all();
       return view('admin.user.index',compact('users'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
        'name'=>'required',
        'email'=>'required'



    ]);
       $user=User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt('password')

    ]);
       Profile::create([
        'user_id'=>$user->id,
        'avatar'=>'uploads/avatar/1.jpg'
    ]);
       Session::flash('success','User Created Successfully!!');
       return redirect()->route('user');
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
    public function admin($id){
         $user=User::find($id);
         $user->admin=1;
         $user->update();

         Session::flash('success','Admin Permission Successfully');
         return redirect()->back();
    }
    public function radmin($id){
        $user=User::find($id);
        $user->admin=0;
        $user->update();
        Session::flash('success','Admin Permission Remove Successfully');
        return redirect()->back();
    }
}
