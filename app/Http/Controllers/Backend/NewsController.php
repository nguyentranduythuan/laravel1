<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\UpdateNews;

use App\News;
use App\Category;


class NewsController extends Controller
{
    public function index()
    {
    	$news = News::paginate(5);

    	return view('backend.news.index',compact('news'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $keys = News::where('title','like','%'.$search.'%')->orWhere('author','like','%'.$search.'%')->orWhere('intro','like','%'.$search.'%')->orWhere('author','like','%'.$search.'%')->orWhere('content','like','%'.$search.'%')->paginate(5);
        // $keys->appends($request->only('search'));
        return view('backend.news.search',compact('keys','search'));
    }

    public function create()
    {
        $categories = Category::all();
        $news = new News;
    	return view('backend.news.edit',compact('categories','news'));
    }

    public function store(NewsRequest $request)
    {
        $news = new News;
        if($request->hasFile('update_image'))
        {
            $image = Storage::putFile('public',$request->file('update_image'));
            //dd($image);
            $news->image = $image;
        }

        $data_news = $request->all();
        //dd($data_news);
        $news->fill($data_news);
        // $news->image = $image;
        $news->save();

        $news->categories()->sync($request->categories);

    	return redirect('admin/news/index')->with('flash_message','You added this content successfully!!!');
    }

    public function edit($id)
    {
    	$categories = Category::all();
    	$news = News::find($id);
    	return view('backend.news.edit',compact('categories','news'));
    }

    public function update(NewsRequest $request,$id)
    {
        $news = News::findOrFail($id);
        $data_news = $request->all();
        $news->fill($data_news);
        if($request->hasFile('update_image'))
        {
            Storage::delete($news->image);
            $image = Storage::putFile('public',$request->file('update_image'));
            $news->image = $image;
            // if(Storage::exists('public',$request->file('update_image')))
            // {
            //     dd('có file');
            // } else {
            //     echo('không có file');
            // }
        }
        
        $news->save();

        $news->categories()->sync($request->categories);

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
