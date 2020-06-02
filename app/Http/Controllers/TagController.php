<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;
class TagController extends Controller
{

  public function index(){
    $tag=Tag::all();
    return view('admin.tag.index',compact('tag'));
  }
  public function create(){
    return view('admin.tag.create');
  }
  public function store(Request $request){
    $this->validate($request, [
        'tag'=>'required'

    ]);
    $tag = new Tag();
    $tag->tag=$request->tag;
    $tag->save();
    Session::flash('success','Tag Created Successfully!!');
    return redirect()->route('tag');
  }
  public function delete($id){
    $tag=Tag::find($id);
    $tag->delete();
    Session::flash('success','Tag Deleted Successfully!!');
    return redirect()->back();
  }
  public function edit($id){
    $tag=Tag::find($id);
    return view('admin.tag.edit',compact('tag'));
  }
  public function update(Request $request,$id){
    $this->validate($request,[
        'tag'=>'required'
    ]);
    $tag=Tag::find($id);
    $tag->tag=$request->tag;
    $tag->update();
    Session::flash('success','Tag is updated Successfully!!');
    return redirect()->route('tag');
  }
}
