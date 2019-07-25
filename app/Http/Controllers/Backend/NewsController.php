<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\NewsRequest;

use App\News;
use App\Category;

class NewsController extends Controller
{
    public function index()
    {
    	$news = News::all();
    	return view('backend.news.index',compact('news'));
    }

    public function create()
    {
    	$categories = Category::all();
    	return view('backend.news.create',compact('categories'));
    }

    public function store(NewsRequest $request)
    {
        $news = new News;

        if($request->hasFile('image'))
        {
            $image = Storage::putFile('public',$request->image);
        }

        $data_news = $request->all();
        
        $news->fill($data_news)->save();

    	return redirect('admin/news/index')->with('flash_message','You added this content successfully!!!');
    }

    public function edit($id)
    {
    	$category = Category::select('id','name')->get();
    	$news = News::find($id);
    	return view('backend.news.edit',compact('category','news'));
    }

    public function update(NewsRequest $request,$id)
    {
        $news = News::findOrFail($id);
        
        if($request->hasFile('image'))
        {
            Storage::delete($news->image);
            $image = Storage::putFile('public',$request->image);
        }

    	
        
    	$news->fill($data_news)->save();


    	return redirect('admin/news/index')->with('flash_message','You edited this content successfully!!!');
    }

    public function delete($id)
    {
        $news = News::find($id);
        if($news->image)
        {
            Storage::delete($news->image);
        }
        $news->delete();

        return redirect('admin/news/index')->with('flash_message','You deleted this news successfully!');

    }
}
