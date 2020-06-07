<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;

class FontendController extends Controller
{
    public function index(){
        $title=Setting::first()->site_name;
        $categors=Category::take(5)->get();
        $first_post=Post::orderBy('created_at','desc')->first();
        $second_post=Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first();
        $thrid_post=Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first();
        return view('index',compact('title','categors','first_post','second_post','thrid_post'));
    }
}
