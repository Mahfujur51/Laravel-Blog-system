<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class ProfileController extends Controller
{

    public function index(){
        $user=Auth::user();
        return view('admin.profile.index',compact('user'));

    }
    public function update(Request $request){

        $this->validate($request,[
            //'name'=>'required',
            //'email'=>'required',
            'about'=>'required',
            'facebook'=>'required|url',
            'youtube'=>'required|url'


        ]);
        $user=Auth::user();
        if ($request->hasFile('avatar')) {
            $avatar=$request->avatar;
            $avatar_new_name=time().$avatar->getClientOriginalName();
            $avatar->move('uploads/avatar',$avatar_new_name);
            $user->profile->avatar='uploads/avatar/'.$avatar_new_name;
            $user->profile->save();
        }
        //$user->name=$request->name;
        //$user->email=$request->email;
        $user->profile->facebook=$request->facebook;
        $user->profile->youtube=$request->youtube;
        $user->profile->about=$request->about;
        if ($request->has('password')) {
            $user->password=bcrypt('$request->password');
        }
        $user->update();
        $user->profile->update();
        Session::flash('success','Your Profile Update Successfully');
        return redirect()->back();



    }
}
