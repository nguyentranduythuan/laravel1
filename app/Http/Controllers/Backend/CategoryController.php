<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::paginate(5);
    	return view('backend.categories.index',compact('categories'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $keys = Category::where('name','like',"%$search%")->orWhere('slug','like',"%$search%")->take(5)->paginate(5);
        return view('backend.categories.search',compact('keys','search'));
    }

    public function create()
    {
        $category = new Category;
    	return view('backend.categories.edit',compact('category'));
    }

    public function store(CategoryRequest $request)
    {
    	$category = new Category;

        $data_category = $request->all();
        //dd($data_category);
    	$category->fill($data_category)->save();

    	return redirect('admin/category/index')->with('flash_message','You added this category name successfully !!!');
    }

    public function edit($id)
    {
    	$category = Category::find($id);
    	return view('backend.categories.edit',compact('category'));
    }

    public function update(CategoryRequest $request,$id)
    {
    	$category = Category::find($id);
        //if(!empty($id))
        //{
            $data_category = $request->all();
            $category->fill($data_category)->save(); 
        //}
        
        
    	return redirect('admin/category/index')->with('flash_message','You updated this Category name successfully !!!');
    }

    public function delete($id)
    {
    	$category = Category::find($id);
    	$category->delete();

    	return redirect('admin/category/index')->with('flash_message','You deleted Successfully !!!!');
    }

}
