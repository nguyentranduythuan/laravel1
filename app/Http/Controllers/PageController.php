<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\News;

class PageController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	$news = News::all();
    	return view('frontend.layouts.index',compact('categories','news'));
    }

    public function category($id)
    {
    	$categories = Category::find($id);
    	$news = News::where('category_id',$id);
    	return view('frontend.layouts.category',compact('categories','news'));
    }

    public function news($id)
    {
    	$category = Category::all();
    	$news = DB::table('news')->select('id','title')->where('category_id')->get();
    	//print_r($news);
    	
    	return view('frontend.layouts.news',compact('news'));
    }

    public function detail($id)
    {
    	$detail = News::find($id);
    	return view('frontend.layouts.detail',compact('detail'));
    }
}
