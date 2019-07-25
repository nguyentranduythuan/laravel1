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
    	$categories = Category::all();
    	return view('backend.categories.index',compact('categories'));
    }

    public function create()
    {
    	return view('backend.categories.create');
    }

    public function store(CategoryRequest $request)
    {
    	$category = new Category;

        $data_category = $request->all();
    	$category->fill($data_category)->save();

    	return redirect('admin/categories/index')->with('flash_message','You added this category name successfully !!!');
    }

    public function edit($id)
    {
    	$category = Category::find($id);
    	return view('backend.categories.edit',compact('category'));
    }

    public function update(CategoryRequest $request,$id)
    {
    	$category = Category::find($id);
    	
        $data_category = $request->all();
    	$category->fill($data_category)->save();

    	return redirect('admin/categories/index')->with('flash_message','You updated this Category name successfully !!!');
    }

    public function delete($id)
    {
    	$category = Category::find($id);
    	$category->delete();

    	return redirect('admin/categories/index')->with('flash_message','You deleted Successfully !!!!');
    }

}
