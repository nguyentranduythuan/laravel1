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

    	return view('frontend.index',compact('categories'));
    }

    public function news($slug = null)
    {
        $categories = Category::all();
        
        $categoryDetail = Category::where(['slug'=> $slug])->first();
        //echo $categoryDetail;
        $newsDetail = News::where(['category_id' => $categoryDetail->id])->get();
        //dd($newsDetail);

        return view('frontend.news.index',compact('categoryDetail','newsDetail','categories')); 
    }

    public function detail($slug)
    {
        $categories = Category::all();
    	$detail = News::where('slug', $slug)->first();
        //dd($detail);
    	return view('frontend.news.detail',compact('detail','categories'));
    }
}
