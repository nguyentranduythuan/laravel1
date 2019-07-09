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
        if(request()->ajax())
        {
            return datatables()->of(AjaxCrud::latest()->get())->addColumn('action',function($data){
                $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                return $button;
            })->rawColumns(['action'])->make(true);
        }
    	$categories = Category::all();
    	return view('backend.modules.category.index',compact('categories'));
    }

    public function create()
    {
    	return view('backend.modules.category.create');
    }

    public function store(CategoryRequest $request)
    {
    	$category = new Category;

    	$category->name = $request->category_name;
    	$category->save();

    	return redirect('admin/category/index')->with('flash_message','You added this category name successfully');
    }

    public function edit($id)
    {
    	$category = Category::find($id);
    	return view('backend.modules.category.edit',compact('category'));
    }

    public function update(CategoryRequest $request,$id)
    {
    	$category = Category::find($id);
    	$category->name = $request->category_name;
    	$category->slug = null;
    	$category->save();

    	return redirect('admin/category/index')->with('flash_message','You updated this Category name successfully !!!');
    }

    public function delete($id)
    {
    	$category = Category::find($id);
    	$category->delete($id);

    	return redirect('admin/category/index')->with('flash_message','You deleted Successfully !!!!');
    }

}
