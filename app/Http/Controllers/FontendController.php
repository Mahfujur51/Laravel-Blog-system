<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;

class FontendController extends Controller
{
    public function index(){
        $title=Setting::first()->site_name;
        $categors=Category::take(5)->get();
        $first_post=Post::orderBy('created_at','desc')->first();
        $second_post=Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first();
        $thrid_post=Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first();
        $laravel=Category::find(2);
        $vue=Category::find(3);
        $setting=Setting::first();
        return view('index',compact('title','categors','first_post','second_post','thrid_post','laravel','vue','setting'));
    }
    public function singlePost($slug){
        $post=Post::where('slug',$slug)->first();
        $title=Setting::first()->site_name;
         $categors=Category::take(5)->get();
          $setting=Setting::first();
          $ttag=Tag::all();
          $next_post=Post::where('id','>',$post->id)->min('id');
          $previous_post=Post::where('id','<',$post->id)->max('id');
          $next=Post::find($next_post);
          $perv=Post::find($previous_post);

        return view('single',compact('post','title','categors','setting','next','perv','ttag'));

    }
    public function category($id){

      $category=Category::find($id);
      $setting=Setting::first();
    $title=Setting::first()->site_name;
       $categors=Category::take(5)->get();
       return view('category',compact('category','setting','title','categors'));
    }
}
