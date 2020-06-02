<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;
class PostController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    $post=Post::all();
// if ($post->count()==0) {
//      Session::flash('info','Please  a post first');
//      return redirect()->back();
// }
    return view('admin.post.index',compact('post'));
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
//
    $category=Category::all();
    if ($category->count()==0) {
        Session::flash('info','Please Create a Category Before Create a post');
        return redirect()->back();
    }
    $tag=Tag::all();
    return view('admin.post.createpost',compact('category','tag'));
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{

//dd($request->all());
    $this->validate($request,[
        'title'=>'required|max:255',
        'featured'=>'required|image',
        'content'=>'required',
        'category_id'=>'required',
        'tags'=>'required'
    ]);
    $featured=$request->featured;
    $featured_new_name=time().$featured->getClientOriginalName();
    $featured->move('uploads/posts',$featured_new_name);
    $post=Post::create([
        'title'=>$request->title,
        'content'=>$request->content,
        'featured'=>'uploads/posts/'.$featured_new_name,
        'category_id'=>$request->category_id,
        'slug'=>str_slug($request->title)
    ]);
   $post->tags()->attach($request->tags);

    Session::flash('success','Post created successfully');
    return redirect()->back();
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
    $post=Post::find($id);
    $categories=Category::all();
    return view('admin.post.edit',compact('post','categories'));
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
    $this->validate($request,[
        'title'=>'required',
        'content'=>'required',
        'category_id'=>'required'
    ]);
    $post=Post::find($id);
    if ($request->hasFile('featured')) {
        $featured=$request->featured;
        $featured_new_name=time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);
        $post->featured='uploads/posts/'.$featured_new_name;
    }
    $post->title=$request->title;
    $post->content=$request->content;
    $post->category_id=$request->category_id;
    $post->update();
    Session::flash('success','Your Post Update Successfully');
    return redirect()->route('post');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
    $post=Post::find($id);
    $post->delete();
    Session::flash('success','Your Move to trushed');
    return redirect()->back();
}
public function trushed(){
    $post=Post::onlyTrashed()->get();
    return view('admin.post.trushed',compact('post'));
}
public function kill($id){
    $post=Post::withTrashed()->Where('id',$id)->first();
    $post->forceDelete();
    Session::flash('success','Your Post Deleted Parmanentely');
    return redirect()->back();
}
public function restore($id){
    $post=Post::withTrashed()->Where('id',$id)->first();
    $post->restore();
    Session::flash('success','Your Post Restored Successfully');
    return redirect()->route('post');
}
}
