<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\NewsRequest;

use App\News;
use App\Category;

class NewsController extends Controller
{
    public function index()
    {
    	$news = News::all();
    	return view('backend.modules.news.index',compact('news'));
    }

    public function create()
    {
    	$categories = Category::all();
    	return view('backend.modules.news.create',compact('categories'));
    }

    public function store(NewsRequest $request)
    {
    	$news = new News;
    	$file_image = $request->file('image')->getClientOriginalName();
    	$news->category_id = $request->category_parent;
    	$news->title = $request->title;
    	$news->author = $request->author;
    	$news->intro = $request->intro;
    	$news->content = $request->content;
    	$news->status = $request->ShowHide;
    	$news->image = $file_image;
    	$request->file('image')->move('resources/upload/',$file_image);
    	$news->save();

    	return redirect('admin/news/index')->with('flash_message','You added this content successfully!!!');
    }

    public function edit($id)
    {
    	$category = Category::select('id','name')->get();
    	$news = News::find($id);
    	return view('backend.modules.news.edit',compact('category','news'));
    }

    public function update(Request $request,$id)
    {
    	$news = News::find($id);

    	$news->category_id = $request->category_parent;
    	$news->title = $request->title;
    	$news->slug = null;
    	$news->author = $request->author;
    	$news->intro = $request->intro;
    	$news->content = $request->content;


    	//$image_current = 'resources/upload/'.$request->input('current_image');
    	if(!empty($request->file('image')))
    	{
    		if(file_exists('current_image'))
    		{
    			unlink('resources/upload/'.$file_image);
    		}
    		$file_image = $request->file('image')->getClientOriginalName();
    		$news->image = $file_image;
    		$request->file('image')->move('resources/upload/',$file_image);
    		
  		}

    	$news->status = $request->ShowHide;
    	$news->save();


    	return redirect('admin/news/index')->with('flash_message','You edited this content successfully!!!');
    }
}
